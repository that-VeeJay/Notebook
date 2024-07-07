<?php

require_once(__DIR__ . '../../../config/Database.php');

class User_model
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
}


