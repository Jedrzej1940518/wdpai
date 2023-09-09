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

    public function findByEmail($email) : User
    {
        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "SELECT * FROM app_user WHERE email = ?";
        $params = [$email];
        
        return $this->createUser($this->database->querySingle($query, $params));
    }

    public function findById($id) : User
    {
        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "SELECT * FROM app_user WHERE id = ?";
        $params = [$id];
        $user_data = $this->database->querySingle($query, $params);
        
        return $this->createUser($this->database->querySingle($query, $params));
    }

    public function findAll()
    {
        // Assuming you have a "app_user" table with columns "email" and "password"
        $query = "SELECT * FROM app_user";
        
        return $this->database->query($query);
    }
    private function createUser($sdObject) : User
    {
        return new User($sdObject->id, $sdObject->email, $sdObject->password);
    }
}
