<?php

require(BASE_PATH . 'config/Database.php');

class Login_model
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
}
