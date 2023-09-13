<?php

require_once __DIR__ . '/../models/AppMatch.php';
require_once __DIR__ . '/../../Database.php';

class AppMatchRepository
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function addAppMatch($accountId, $kills, $deaths, $assists, $rank, $champion)
    {
        $query = "INSERT INTO match (account_id, kills, deaths, assists, rank, champion) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$accountId, $kills, $deaths, $assists, $rank, $champion];

        return $this->database->execute($query, $params);
    }

    public function listAllAppMatches()
    {
        $query = "SELECT * FROM match";
        return $this->database->query($query);
    }
    public function getAppMatchesByAccount($account_id)
    {
        $query = "SELECT * FROM match WHERE account_id = ?";
        $params = [$account_id];

        $matches_data = $this->database->queryParams($query, $params);
        $matches = [];
        $i=0;
        foreach($matches_data as $match_data){
            $matches[$i] = $this->createAppMatch($match_data);
            $i++;
        }
        return $matches;
    }
    public function findAppMatchById($id): AppMatch
    {
        $query = "SELECT * FROM match WHERE id = ?";
        $params = [$id];

        return $this->createAppMatch($this->database->querySingle($query, $params));
    }

    private function createAppMatch($db_object): AppMatch
    {
        return new AppMatch($db_object['id'], $db_object['account_id'], $db_object['kills'], $db_object['deaths'], $db_object['assists'], $db_object['rank'], $db_object['champion']);
    }
}
