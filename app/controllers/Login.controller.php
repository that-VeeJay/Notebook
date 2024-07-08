<?php
require(__DIR__ . '/../../config/constants.php');

require(BASE_PATH . 'app/helpers/authentication.helper.php');
require(BASE_PATH . 'app/models/Login.model.php');

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    private static function sanitizeInput($data)
    {
        return [
            'email' => trim($data['email']),
            'password' => trim($data['password']),
        ];
    }

    private static function handleSuccessfulLogin($userType)
    {
        if ($userType == 'user') {
            $_SESSION['loggedIn-user'] = true;
            header("Location: " . ROOT_URL . "user/homepage.php");
            exit();
        } elseif ($userType === 'admin') {
            $_SESSION['loggedIn-admin'] = true;
            header("Location: " . ROOT_URL . "admin/homepage.php");
            exit();
        }
    }

    private static function handleInvalidLogin()
    {
        $_SESSION['login-data'] = $_POST;
        flashMessage('errors', 'Invalid email or password.');
        header("Location: " . ROOT_URL . "login.php");
        exit();
    }

    public function login()
    {
        $data = self::sanitizeInput($_POST);

        $hashedPassword = $this->loginModel->getHashedPassword($data);

        if ($hashedPassword !== null && password_verify($data['password'], $hashedPassword)) {
            $userType = $this->loginModel->getUserType($data);
            self::handleSuccessfulLogin($userType);
        } else {
            self::handleInvalidLogin();
        }
    }
}

$init = new LoginController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'login':
            $init->login();
            break;
        default:
    }
}
