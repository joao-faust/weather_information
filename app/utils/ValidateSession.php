<?php

namespace MyApp\utils;
session_start();

class ValidateSession
{
    public function __construct()
    {
        if (!isset($_SESSION["userId"]))
        {
            header("Location: ../views/login.php");
            exit;
        }
    }
}