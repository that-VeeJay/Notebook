<?php
require(__DIR__ . '/../../config/constants.php');
require(BASE_PATH . 'app/helpers/authentication.helper.php');
require(BASE_PATH . 'app/models/Login.model.php');

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

        if ($hashedPassword !== null) {
            $verifyPassword = password_verify($data['password'], $hashedPassword);
            if ($verifyPassword) {
                // Redirect to homepage after success login
                header("Location: " . ROOT_URL . "/app/views/user/homepage.php");
                exit();
            }
        }
        //Handle invalid login
        $_SESSION['login-data'] = $_POST;
        flashMessage('errors', 'Invalid email or password.');
        header("Location: " . ROOT_URL . "login.php");
        exit();
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
