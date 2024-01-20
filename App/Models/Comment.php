<?php

namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    protected ?int $id = null;
    protected int $user;
    protected int $post;

    protected string $text;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): void
    {
        $this->user = $user;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(?string $post): void
    {
        $this->post = $post;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }


}