<?php

require_once(__DIR__ . '../../helpers/authentication.helper.php');
require_once(__DIR__ . '/../models/Login.model.php');

class Login_controller
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new Login_model();
    }

    public function login()
    {
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        $hashedPassword = $this->loginModel->getHashedPassword($data);
        $verifyPassword = password_verify($data['password'], $hashedPassword);

        if ($verifyPassword) {
            header("Location: ../views/user/homepage.php");
            exit();
        } else {
            $_SESSION['login-data'] = $_POST;
            flashMessage('errors', 'Invalid email or password.');
            header("Location: ../../login.php");
            exit();
        }
    }
}

$init = new Login_controller();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'login':
            $init->login();
            break;
        default:
    }
}
