<?php

require_once(__DIR__ . '../../../config/Database.php');

class User_model
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function register()
    {
    }

    public function login()
    {
    }
}


$init = new User_model();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register';
            $init->register();
            break;
        case 'login';
            $init->login();
            break;
        default;
    }
}
