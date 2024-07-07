<?php

require(BASE_PATH . 'config/Database.php');

class Registration_model
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getUsername($data): bool
    {
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $data['username']);
        $stmt->execute();
        $result = $stmt->rowCount();

        return (empty($result)) ? false : true;
    }

    public function getEmail($data): bool
    {
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        $result = $stmt->rowCount();

        return (empty($result)) ? false : true;
    }

    public function insertUserToDb($data, $avatarName): bool
    {
        $query = "INSERT INTO users (first_name, last_name, username, email, password, avatar) VALUES (:first_name, :last_name, :username, :email, :password, :avatar);";
        $stmt = $this->db->prepare($query);
        $params = [
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
            ':avatar' => $avatarName,
        ];
        return $stmt->execute($params);
    }
}
