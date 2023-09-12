<?php

class Account implements JsonSerializable
{
    public int $id;
    public int $proId;
    public string $summonerName;
    public string $server;
    public int $lp;

    public function __construct(int $id, int $proId, string $summonerName, string $server, int $lp)
    {
        $this->id = $id;
        $this->proId = $proId;
        $this->summonerName = $summonerName;
        $this->server = $server;
        $this->lp = $lp;
    }

    public function getSummonerName(): string
    {
        return $this->summonerName;
    }

    public function setSummonerName(string $summonerName)
    {
        $this->summonerName = $summonerName;
    }

    public function getServer(): string
    {
        return $this->server;
    }

    public function setServer(string $server)
    {
        $this->server = $server;
    }

    public function getLp(): int
    {
        return $this->lp;
    }

    public function setLp(int $lp)
    {
        $this->lp = $lp;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getProId(): int
    {
        return $this->proId;
    }

    public function setProId(int $proId)
    {
        $this->proId = $proId;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'pro_id' => $this->proId,
            'summoner_name' => $this->summonerName,
            'server' => $this->server,
            'lp' => $this->lp,
        ];
    }
}