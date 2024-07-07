<?php

require_once(__DIR__ . '../../models/User.model.php');

class Users_controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User_model();
    }

    private function inputFieldsValidation($data)
    {
        $errors = [];

        if (!preg_match('/^[a-zA-Z ]+$/', $data['username'])) {
            $errors[] = 'Invalid Username.';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid Email';
        }

        // Check email duplicates

        if (strlen($data['password']) < 3) {
            $errors[] = 'Password must be at least 8 characters long.';
        }

        if ($data['password'] != $data['confirm_password']) {
            $errors[] = 'Passwords does not match.';
        }
        return $errors;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
            ];

            $errors = $this->inputFieldsValidation($data);
        }
    }

    public function login()
    {
    }
}

$init = new Users_controller();

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
