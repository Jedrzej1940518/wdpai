<?php

require_once "config.php";

class Database
{
    private $host = HOST;
    private $dbname = DATABASE;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $port = PORT;

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function execute($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return true;
        } catch (PDOException $e) {
            die("Database query error: " . $e->getMessage());
        }
    }

    public function query($query)
    {
        try {
            $stmt = $this->connection->query($query);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database query error: " . $e->getMessage());
        }
    }

    public function querySingle($query, $params)
    {
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchObject();
        } catch (PDOException $e) {
            die("Database query error: " . $e->getMessage());
        }
    }
}