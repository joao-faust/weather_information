<?php

namespace MyApp\models;
use MyApp\database\DbConnection;

class ApiModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new DbConnection();
    }

    public function addSearch($cityName, $temperature, $feelsLikeTemperature, $forecasts, $humidity, $windSpeed, $day, $hour, $year)
    {
        $sql = "INSERT INTO searchs(cityName, temperature, feelslikeTemperature, forecasts, humidity, windSpeed, actualDay, actualHour,actualYear, user) VALUES('$cityName', '$temperature', '$feelsLikeTemperature', '$forecasts', '$humidity', '$windSpeed', '$day', '$hour', '$year', '$_SESSION[userId]')";

        $this->conn->query($sql);
        return $this->conn->lastInsertId();
    }

    public function listHistory()
    {
        $sql = "SELECT * FROM searchs WHERE user='$_SESSION[userId]' ORDER BY id DESC";
        $searchs = $this->conn->query($sql);

        return $searchs;
    }

    public function cleanHistory()
    {
        $sql = "DELETE FROM searchs WHERE user='$_SESSION[userId]'";
        $this->conn->query($sql);

        return $_SESSION["userId"];
    }

    public function cleanSearch($idsearch)
    {
        $sql = "DELETE FROM searchs WHERE id=$idsearch";
        $this->conn->query($sql);

        return $idsearch;
    }

    public function listSoloHistory($idsearch)
    {
        $sql = "SELECT * FROM searchs WHERE id=$idsearch and user=$_SESSION[userId]";
        $search = $this->conn->query($sql)->fetch();
  
        return $search;
    }
}