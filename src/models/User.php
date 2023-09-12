<?php

class User implements JsonSerializable
{
    public int $id;
    public string $email;
    public string $password;
    public array $proIds;

    public function __construct(int $id, string $email, string $password, array $proIds)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->proIds = $proIds;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getProIds(): array
    {
        return $this->proIds;
    }

    public function setProIds(array $proIds)
    {
        $this->proIds = $proIds;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'proIds' => $this->proIds,
        ];
    }
}