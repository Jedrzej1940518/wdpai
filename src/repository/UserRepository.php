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
        $pro_ids = $user->getProIds();


        $query = "INSERT INTO app_user (email, password, pro_ids) VALUES (?, ?, ?)";
        $postgres_array = '{' . implode(',', $pro_ids) . '}';
        $params = [$email, $password, $postgres_array];

        return $this->database->execute($query, $params);
    }

    public function emailAlreadyUsed($email)
    {
        $query = "SELECT * FROM app_user WHERE email = ?";
        $params = [$email];

        return $this->database->querySingle($query, $params) !== false;
    }

    public function findByEmail($email): User
    {

        $query = "SELECT * FROM app_user WHERE email = ?";
        $params = [$email];

        return $this->createUserAppData($this->database->querySingle($query, $params));
    }

    public function findById($id): User
    {

        $query = "SELECT * FROM app_user WHERE id = ?";
        $params = [$id];

        return $this->createUserAppData($this->database->querySingle($query, $params));
    }

    public function findAll()
    {
        $query = "SELECT * FROM app_user";

        return $this->database->query($query);
    }

    public function addProToUser($user_id, $pro_id)
    {
        $query = "UPDATE app_user SET pro_ids = array_append(pro_ids, ?) WHERE id = ?";
        $params = [$pro_id, $user_id];

        return $this->database->execute($query, $params);
    }

    public function removeProFromUser($user_id, $pro_id)
    {
        $query = "UPDATE app_user SET pro_ids = array_remove(pro_ids, ?) WHERE id = ?";
        $params = [$pro_id, $user_id];

        return $this->database->execute($query, $params);
    }

    public function getUserPros($user_id)
    {
        $query = "SELECT pro_ids FROM app_user WHERE id = ?";
        $params = [$user_id];

        return $this->parseProIds($this->database->querySingle($query, $params)->pro_ids);
    }

    public function createUserAppData($sdObject): User
    {
        $array = $this->parseProIds($sdObject->pro_ids);
        return new User($sdObject->id, $sdObject->email, $sdObject->password, $array);
    }
    private function parseProIds($pgArray): array
    {
        //remove braces and seperate numbers by ','
        $elements = explode(',', trim($pgArray, '{}'));

        $parsedArray = [];

        foreach ($elements as $element) {
            $parsedArray[] = (int) $element;
        }

        return $parsedArray;
    }
}