<?php

require_once(__DIR__ . '../../models/User.model.php');

class Users_controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User_model();
    }
}
