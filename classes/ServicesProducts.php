<?php

namespace App\Classes;

class ServicesProducts
{
    private int $user_id;
    private string $img_url;
    private string $description;

    public function __construct(int $user_id, string $img_url, string $description)
    {
        $this->setUserId($user_id);
        $this->setImgUrl($img_url);
        $this->setDescription($description);
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getImgUrl(): string
    {
        return $this->img_url;
    }

    public function setImgUrl(string $img_url): self
    {
        $this->img_url = $img_url;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
}
