<?php
require("../../autoload.php");

use MyApp\utils\ValidateSession;
new ValidateSession();

use MyApp\models\ApiModel;
use MyApp\utils\ChangeBackground;

class CallApi
{
    private $ApiModel;
    private $city;
    private $api_key;
    private $curl;
    private $api_response;

    public function __construct()
    {
        $this->ApiModel = new ApiModel();
        $this->city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->api_key = "d826ce87648d7f78b4d0bb23688ce5e3";
        $this->curl = curl_init();
        $this->api_response = null;
    }

    public function call_api()
    {
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?q={$this->city}&appid=$this->api_key",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));
        
        $this->api_response = curl_exec($this->curl);
        curl_close($this->curl);
        $this->api_response = json_decode($this->api_response, true);
    
        $this->verifies_if_city_doesnt_exist(); 
    }

    public function verifies_if_city_doesnt_exist()
    {
        if ($this->api_response["cod"] == "404")
        {
            $_SESSION["error"] = "City not found!";
            header("Location: ../views/principal.php");
        }
        else if(!$this->city)
        {
            $_SESSION["error"] = "You need to type a city!";
            header("Location: ../views/principal.php");
        } 
        else {
            $this->get_apidata();
        }
    }

    public function get_apidata()
    {
        $_SESSION["city_name"] = strval($this->api_response["name"]);
        $_SESSION["temperature"] = strval(($this->api_response["main"]["temp"]) - 273.15);
        $_SESSION["feelslike_temperature"] = strval(($this->api_response["main"]["feels_like"]) -273.15);
        $_SESSION["forecasts"] = strval($this->api_response["weather"][0]["description"]);
        $_SESSION["humidity"] = strval($this->api_response["main"]["humidity"]);
        $_SESSION["wind_speed"] = strval($this->api_response["wind"]["speed"]);
        strval($day = date("d/m"));
        strval($hour = date("H:i:s"));
        strval($year = date("Y"));
        
        $this->ApiModel->addSearch($_SESSION["city_name"], $_SESSION["temperature"], $_SESSION["feelslike_temperature"], $_SESSION["forecasts"], $_SESSION["humidity"], $_SESSION["wind_speed"], $day, $hour, $year);
    
        new ChangeBackground($_SESSION["temperature"]);
        $this->show_data();
    }

    public function show_data()
    {
        header("Location: ../views/results.php");
    }
}

$Api = new CallApi();
$Api->call_api();