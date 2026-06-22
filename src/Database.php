<?php

class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private ?PDO $conn = null;

    public function __construct() {
        $config = require __DIR__ . '/../config.php';
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function getConnection() {
        if ($this->conn !== null) return $this->conn;
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            die("Database error: " . $exception->getMessage());
        }
        return $this->conn;
    }
}