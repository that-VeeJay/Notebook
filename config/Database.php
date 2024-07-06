<?php

$config  = parse_ini_file(__DIR__ . '/config.ini', true);
class Database
{
    public static $host;
    public static $dbname;
    public static $dbUsername;
    public static $dbPassword;

    public static function init()
    {
        global $config;
        self::$host = $config['database']['hostname'];
        self::$dbname = $config['database']['database_name'];
        self::$dbUsername = $config['database']['database_username'];
        self::$dbPassword = $config['database']['database_password'];
    }

    public static function connect()
    {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
            $pdo = new PDO($dsn, self::$dbUsername, self::$dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            exit('Database Connection Failed:' . $e->getMessage());
        }
    }
}
