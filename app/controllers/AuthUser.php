<?php
require("../../autoload.php");
use MyApp\models\UserModel;

session_start();

class AuthUser
{
    private $UserModel;
    private $email;
    private $password;

    public function __construct()
    {
        $this->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $this->UserModel = new UserModel();
    }

    public function validateLogin($user)
    {
        if (!$user["userEmail"] or !password_verify($this->password, $user["userPassword"]))
        {
            $_SESSION["error"] = "E-mail ou senha incorretos!";
            return true;
        }
    
        return false;
    }

    public function authUser()
    {
        $user = $this->UserModel->emailExists($this->email);
        if ($this->validateLogin($user))
        {
            header("Location: ../views/login.php");
            exit;
        }

        $_SESSION["userName"] = $user["userName"];
        $_SESSION["userId"] = $user["id"];
        header("Location: ../views/principal.php");
    }
}

$AuthUser = new AuthUser();
$AuthUser->authUser();