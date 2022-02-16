<?php

namespace MyApp\models;
use MyApp\database\DbConnection;

class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = new DbConnection();
    }

    public function addUser($name, $email, $password)
    {
        $sql = "INSERT INTO users(userName, userEmail, userPassword) 
        VALUES('$name','$email','$password')";

        $this->conn->query($sql); 
        return $this->conn->lastInsertId();
    }

    public function emailExists($email)
    {
        $sql = "SELECT * FROM users WHERE userEmail='$email'";
        $users = $this->conn->query($sql);
        $user = $users->fetch();

        return $user;
    }
}