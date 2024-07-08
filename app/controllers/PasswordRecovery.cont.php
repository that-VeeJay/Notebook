<?php

require(__DIR__ . '/../../config/constants.php');
require(BASE_PATH . 'app/helpers/authentication.helper.php');
require(BASE_PATH . 'app/models/PasswordRecovery.model.php');

class PasswordRecovery_cont
{
    private $passRecoveryModel;

    public function __construct()
    {
        $this->passRecoveryModel = new PasswordRecovery_model();
    }

    private static function redirectTo($path)
    {
        header('Location: ' . ROOT_URL  . $path);
        exit();
    }

    private static function flashAndRedirect($type, $message, $path)
    {
        flashMessage($type, $message);
        header('Location: ' . ROOT_URL  . $path);
        exit();
    }

    public function forgotPassword()
    {
        $email = $_POST['email'];

        $result = $this->passRecoveryModel->checkIfEmailExists($email);

        if (!$result) {
            $_SESSION['recovery-email'] = $email;
            self::redirectTo('resetPassword.php');
        } else {
            self::flashAndRedirect('errors', 'Email not found.', 'forgotPassword.php');
        }
    }

    public function resetPassword()
    {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (strlen($new_password) < 8) {
            self::flashAndRedirect('errors', 'New password too short.', 'resetPassword.php');
            return;
        }

        if ($new_password !== $confirm_password) {
            self::flashAndRedirect('errors', 'Password does not match.', 'resetPassword.php');
            return;
        }

        if ($this->passRecoveryModel->updatePassword($new_password)) {
            unset($_SESSION['recovery-email']);
            self::flashAndRedirect('success', 'Password changed!', 'login.php');
            return;
        }

        flashMessage('errors', 'Failed to reset password.');
        self::redirectTo('resetPassword.php');
    }
}

$init = new PasswordRecovery_cont();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
            // Forgot Password
        case 'recover':
            $init->forgotPassword();
            break;
            // Change Password
        case 'reset':
            $init->resetPassword();
        default:
    }
}
