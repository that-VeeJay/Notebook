<?php

require(__DIR__ . '/../../config/constants.php');
require(BASE_PATH . 'app/models/Registration.model.php');
require(BASE_PATH . 'app/helpers/authentication.helper.php');

class Registration_controller
{
    private $registrationModel;
    private static $errors = [];
    private static $avatarName;

    const MAX_FILE_SIZE = 500000; // 5MB
    const ALLOWED_EXTENSIONS = ['png', 'jpg', 'jpeg'];
    const AVATAR_UPLOAD_PATH = BASE_PATH . '/assets/avatars/';
    const PASSWORD_LENGTH = 3; // Change to 8 later on

    public function __construct()
    {
        $this->registrationModel = new Registration_model();
    }

    private function validateInputs($data): array
    {
        if (empty($data['first_name'])) {
            self::$errors[] = 'First name should not be empty.';
        }

        if (empty($data['last_name'])) {
            self::$errors[] = 'Last name should not be empty.';
        }

        if (empty($data['username'])) {
            self::$errors[] = 'Username should not be empty.';
        } elseif ($this->registrationModel->getUsername($data)) {
            self::$errors[] = 'Username already taken.';
        }

        if (empty($data['email'])) {
            self::$errors[] = 'Email should not be empty.';
        } elseif ($this->registrationModel->getEmail($data)) {
            self::$errors[] = 'Email already exists.';
        }

        if (empty($data['password'])) {
            self::$errors[] = 'Password should not be empty.';
        } elseif (strlen($data['password']) < self::PASSWORD_LENGTH) {
            self::$errors[] = 'Password should be at least 8 characters.';
        }

        if (empty($data['confirm_password'])) {
            self::$errors[] = 'Confirm password should not be empty.';
        } elseif ($data['password'] != $data['confirm_password']) {
            self::$errors[] = 'Passwords do not match.';
        }

        if (empty($data['avatar']['name'])) {
            self::$errors[] = 'Avatar should not be empty.';
        }

        return self::$errors;
    }

    private function handleImageUpload($data): void
    {
        $fileTmpName = $data['avatar']['tmp_name'];
        $fileName = $data['avatar']['name'];
        $fileSize = $data['avatar']['size'];
        $fileError = $data['avatar']['error'];

        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));

        if (in_array($fileActualExtension, self::ALLOWED_EXTENSIONS)) {
            if ($fileError === 0) {
                if ($fileSize < self::MAX_FILE_SIZE) {
                    self::$avatarName = uniqid('', true) . "." . $fileActualExtension;
                    $fileDestination = self::AVATAR_UPLOAD_PATH . self::$avatarName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    self::$errors[] = "Your image is too big.";
                }
            } else {
                self::$errors[] = "There is an error uploading your file.";
            }
        } else {
            self::$errors[] = "You cannot upload files of this type";
        }
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'avatar' => $_FILES['avatar'],
            ];

            $errors = $this->validateInputs($data);

            if (!empty($errors)) {
                // Send temporary session data to registration
                $_SESSION['registration-data'] = $_POST;

                flashMessage('errors', self::$errors[0]);
                header("Location: " . ROOT_URL . "register.php");
                exit();
            } else {
                $this->handleImageUpload($data);
                $this->registrationModel->insertUserToDb($data, self::$avatarName);

                flashMessage('success', 'You are now registered!');
                header("Location: " . ROOT_URL . "register.php");
                exit();
            }
        }
    }
}

$init = new Registration_controller();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        default:  // Handle other cases if needed
    }
}
