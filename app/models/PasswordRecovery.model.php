<?php
require(BASE_PATH . 'config/Database.php');

class PasswordRecovery_model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function checkIfEmailExists($email)
    {
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->rowCount();

        return (empty($result)) ? true : false;
    }

    public function updatePassword($new_password)
    {
        $query = "UPDATE users SET password = :password WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $params = [
            ':password' => $new_password,
            ':email' => $_SESSION['recovery-email'],
        ];
        return $stmt->execute($params);
    }
}
