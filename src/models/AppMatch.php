<?php

class AppMatch implements JsonSerializable
{
    public $id;
    public $account_id;
    public $kills;
    public $deaths;
    public $assists;
    public $rank;
    public $champion;

    public function __construct($id, $account_id, $kills, $deaths, $assists, $rank, $champion)
    {
        $this->id = $id;
        $this->account_id = $account_id;
        $this->kills = $kills;
        $this->deaths = $deaths;
        $this->assists = $assists;
        $this->rank = $rank;
        $this->champion = $champion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAccountId()
    {
        return $this->account_id;
    }

    public function getKills()
    {
        return $this->kills;
    }

    public function getDeaths()
    {
        return $this->deaths;
    }

    public function getAssists()
    {
        return $this->assists;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getChampion()
    {
        return $this->champion;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'account_id' => $this->account_id,
            'kills' => $this->kills,
            'deaths' => $this->deaths,
            'assists' => $this->assists,
            'rank' => $this->rank,
            'champion' => $this->champion
        ];
    }
}