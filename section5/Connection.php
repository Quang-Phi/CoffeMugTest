<?php
class Connection
{
    private $conn;
    private static $instance = null;
    private function __construct($config)
    {
        try {
            $this->conn = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['pass']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance == null) {
            self::$instance = new self($config);
        }
        return self::$instance;
    }
    public static function getConn($config)
    {
        return self::getInstance($config)->conn;
    }
}
