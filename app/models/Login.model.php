<?php

require_once(__DIR__ . '/../../config/Database.php');

class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getHashedPassword($data): string
    {
        $query = "SELECT password FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['password'];
    }
}
