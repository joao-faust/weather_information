<?php
session_start();

require("../../autoload.php");
use MyApp\models\UserModel;

class RegisterUser
{
    private $UserModel;
    private $name;
    private $email;
    private $password;

    public function __construct()
    {
        $this->name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->UserModel = new UserModel();
    }

    public function validateRegister()
    {
        if (strlen($this->name) < 5 or strlen($this->name) > 15 or strlen($this->password) < 8 or !filter_var($this->email, FILTER_VALIDATE_EMAIL) or strlen($this->email) > 25)
        {
            $_SESSION["error"] = "Expertinho!";
            return true;
        }
    
        if ($this->UserModel->emailExists($this->email)) 
        {
            $_SESSION["error"] = "E-mail já existe!";
            return true;
        }
    
        return false;
    }

    public function addUser()
    {
        if ($this->validateRegister())
        {
            header("Location: ../views/register.php");
            exit;
        }
        
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $user = $this->UserModel->addUser($this->name, $this->email, $this->password);
        if ($user)
        {
            header("Location: ../views/login.php");
        }
    }
}

$RegisterUser = new RegisterUser();
$RegisterUser->addUser();