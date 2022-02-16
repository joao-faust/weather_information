<?php
session_start();

class Logout
{
    public function __construct()
    {
        session_destroy();
        header("Location: ../views/login.php");
        exit;
    }
}

new Logout();