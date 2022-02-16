<?php

namespace MyApp\controllers;
use MyApp\models\ApiModel;

class SoloHistory
{
    private $ApiModel;

    public function __construct()
    {
        $this->ApiModel = new ApiModel();
    }

    public function getSoloHistory($idsearch)
    {
        $search = $this->ApiModel->listSolohistory($idsearch);
        return $search;
    }
}