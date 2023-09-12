<?php


class Pro implements JsonSerializable
{
    public int $id;
    public string $name;
    public bool $img_exists;

    public function __construct(int $id, string $name, bool $img_exists)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img_exists = $img_exists;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getImgExists(): bool
    {
        return $this->img_exists;
    }

    public function setImgExists(bool $img_exists)
    {
        $this->img_exists = $img_exists;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img_exists' => $this->img_exists
        ];
    }
}