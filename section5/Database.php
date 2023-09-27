<?php
class Database
{
    private $conn;
    public function __construct()
    {
        global $config;
        $this->conn = Connection::getConn($config['db']);
    }

    public static function query($sql, $params = [])
    {
        $self = new self();
        $stmt = $self->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($users)
    {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        
        foreach ($users as $user) {
            $params = [
                ':name' => $user['name'],
                ':email' => $user['email'],
            ];
            
            self::query($sql, $params);
        }
    }
}
