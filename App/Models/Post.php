<?php

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
protected ?int $id = null;
protected string $miesto;
protected string $nazov;
protected string $obrazok;

protected string $text;
protected string $datum;
protected int $user;
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNazov(): ?string
    {
        return $this->nazov;
    }

    public function setNazov(?string $nazov): void
    {
        $this->nazov = $nazov;
    }

    public function getObrazok(): ?string
    {
        return $this->obrazok;
    }

    public function setObrazok(?string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getMiesto(): ?string
    {
        return $this->miesto;
    }

    public function setMiesto(?string $miesto): void
    {
        $this->miesto = $miesto;
    }

    public function getDatum(): ?string
    {
        return $this->datum;
    }

    public function setDatum(?string $datum): void
    {
        $this->datum = $datum;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(?int $user): void
    {
        $this->user = $user;
    }
}

