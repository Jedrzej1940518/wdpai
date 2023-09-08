<?php

require_once 'Database.php';

class UserRepository
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function insert(User $user)
    {
        $email = $user->getEmail();
        $password = $user->getPassword();

        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "INSERT INTO app_user (email, password) VALUES (?, ?)";
        
        $params = [$email, $password];
        
        return $this->database->execute($query, $params);
    }

    public function findByEmail($email)
    {
        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "SELECT * FROM app_user WHERE email = ?";
        $params = [$email];
        
        return $this->database->querySingle($query, $params);
    }

    public function findAll()
    {
        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "SELECT * FROM app_user";
        
        return $this->database->query($query);
    }
}
