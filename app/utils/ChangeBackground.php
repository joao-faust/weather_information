<?php
namespace MyApp\utils;

class ChangeBackground
{
    public function __construct($temperature)
    {
        if (floatval($temperature) <= 5.0) {
            $_SESSION["background_option"] = "snow";
        } else if (floatval($temperature) <= 20.0) {
            $_SESSION["background_option"] = "nice";
        } else if (floatval($temperature) <= 30.0) {
            $_SESSION["background_option"] = "beach";
        } else {
            $_SESSION["background_option"] = "desert";
        }
    }
}