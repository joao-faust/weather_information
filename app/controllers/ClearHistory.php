<?php
require("../../autoload.php");

use MyApp\utils\ValidateSession;
new ValidateSession();

use MyApp\models\ApiModel;

class ClearHistory
{
    private $ApiModel;

    public function __construct()
    {
        $this->ApiModel = new ApiModel();
    }

    public function cleanHistory()
    {
        $deletedHistory = $this->ApiModel->cleanHistory();

        if ($deletedHistory)
        {
            header("Location: ../views/history.php"); 
            exit;
        }
    }
}

$ClearHistory = new ClearHistory();
$ClearHistory->cleanHistory();