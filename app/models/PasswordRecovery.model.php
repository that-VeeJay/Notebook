<?php
require(BASE_PATH . 'config/Database.php');

class PasswordRecovery_model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function checkIfEmailExists($email): bool
    {
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->rowCount();

        return (empty($result)) ? true : false;
    }

    public function updatePassword($new_password): bool
    {
        $query = "UPDATE users SET password = :password WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $params = [
            ':password' => password_hash($new_password, PASSWORD_BCRYPT),
            ':email' => $_SESSION['recovery-email'],
        ];
        return $stmt->execute($params);
    }
}
