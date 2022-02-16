<?php
namespace MyApp\controllers;
use MyApp\models\ApiModel;

class History
{
    private $ApiModel;

    public function __construct()
    {
        $this->ApiModel = new ApiModel();
    }

    public function getHistory()
    {
        $search = $this->ApiModel->listHistory();
        return $search;
    }
}