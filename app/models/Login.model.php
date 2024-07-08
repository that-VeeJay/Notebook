<?php

require(BASE_PATH . 'config/Database.php');

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getHashedPassword($data)
    {
        $query = "SELECT password FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }
        return $result['password'];
    }

    public function getUserType($data)
    {
        $query = "SELECT user_type FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return null;
        }

        return $result['user_type'];
    }
}
