<?php

require_once __DIR__.'/../models/Account.php';
require_once __DIR__.'/../models/Pro.php';
require_once __DIR__.'/../../Database.php';

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
        return $this->database->query($query, $params, 'Pro');
    }

    public function findProById($id) : Pro
    {
        $query = "SELECT * FROM pro WHERE id = ?";
        $params = [$id];

        return $this->createPro($this->database->querySingle($query, $params, 'Pro'));
    }

    public function findProByName($name) : Pro
    {
        $query = "SELECT * FROM pro WHERE name = ?";
        $params = [$name];

        return $this->createPro($this->database->querySingle($query, $params, 'Pro'));
    }

    public function addAccount($proId, $summonerName, $server, $lp)
    {
        $query = "INSERT INTO account (pro_id, summoner_name, server, lp) VALUES (?, ?, ?, ?)";
        $params = [$proId, $summonerName, $server, $lp];

        return $this->database->execute($query, $params);
    }

    public function findAccountById($id) : Account
    {
        $query = "SELECT * FROM account WHERE id = ?";
        $params = [$id];

        return createAccount($this->database->querySingle($query, $params, 'Account'));
    }
    public function getDefaultPros() : array
    {
        $pro_names = ["Caps", "Faker", "Baus"];
        $pros = []; 

        foreach ($pro_names as $pro_name)
        {
            $pros[$pro_name] = $this->findProByName($pro_name);
        }
        return $pros;

    }
    private function createPro($dbObject): Pro
    {
        return new Pro($dbObject->id, $dbObject->name, $dbObject->img_exists);
    }
    
    private function createAccount($dbObject): Account
    {
        return new Account($dbObject->id, $dbObject->pro_id, $dbObject->summoner_name, $dbObject->server, $dbObject->lp);
    }
}
