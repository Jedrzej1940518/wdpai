<?php

require_once __DIR__ . '/../models/Account.php';
require_once __DIR__ . '/../models/Pro.php';
require_once __DIR__ . '/../../Database.php';

class ProRepository
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addPro($name, $img_exists)
    {
        $query = "INSERT INTO pro (name, img_exists) VALUES (?, ?)";
        $params = [$name, $img_exists];

        return $this->database->execute($query, $params);
    }
    public function listAllPros()
    {
        $query = "SELECT * FROM pro";
        return $this->database->query($query);
    }
    public function getProAccounts($pro_id)
    {
        $query = "SELECT * FROM account WHERE pro_id = ?";
        $params = [$pro_id];

        $accounts_data = $this->database->queryParams($query, $params);
        $accounts = [];
        $i=0;
        foreach($accounts_data as $account_data){
            $accounts[$i] = $this->createAccount($account_data);
            $i++;
        }
        return $accounts;
    }

    public function findProById($id): Pro
    {
        $query = "SELECT * FROM pro WHERE id = ?";
        $params = [$id];

        return $this->createPro($this->database->querySingle($query, $params));
    }

    public function findProByName($name): Pro
    {
        $query = "SELECT * FROM pro WHERE name = ?";
        $params = [$name];

        return $this->createPro($this->database->querySingle($query, $params));
    }

    public function addAccount($proId, $summonerName, $server, $lp)
    {
        $query = "INSERT INTO account (pro_id, summoner_name, server, lp) VALUES (?, ?, ?, ?)";
        $params = [$proId, $summonerName, $server, $lp];

        return $this->database->execute($query, $params);
    }

    public function getDefaultPros(): array
    {
        $pro_names = ["Caps", "Faker", "Baus"];
        $pros = [];

        foreach ($pro_names as $pro_name) {
            $pros[$pro_name] = $this->findProByName($pro_name);
        }
        return $pros;

    }
    private function createPro($db_object): Pro
    {
        return new Pro($db_object->id, $db_object->name, $db_object->img_exists);
    }

    private function createAccount($db_object): Account
    {
        return new Account($db_object['id'], $db_object['pro_id'], $db_object['summoner_name'], $db_object['server'], $db_object['lp']);
    }
}