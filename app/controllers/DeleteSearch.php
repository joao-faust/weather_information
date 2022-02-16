<?php
require("../../autoload.php");

use MyApp\utils\ValidateSession;
new ValidateSession();

use MyApp\models\ApiModel;

class DeleteSearch
{
    private $ApiModel;
    private $id;

    public function __construct()
    {
        $this->ApiModel = new ApiModel();
        $this->id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public function cleanSearch()
    {
        $deletedSearch = $this->ApiModel->cleanSearch($this->id);
        if ($deletedSearch)
        {
            header("Location: ../views/history.php");
            exit;
        }
    }
}

$DeleteSearch = new DeleteSearch();
$DeleteSearch->cleanSearch();