<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected ?int $id = null;
    protected string $username;
    protected string $password;
    protected string $email;
    protected string $birthdate;
    protected int $permission;
    protected string $obrazok;

    public function getObrazok(): string
    {
        return $this->obrazok;
    }

    public function setObrazok(string $obrazok): void
    {
        $this->obrazok = $obrazok;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    public function setBirthdate(?string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): void
    {
        $this->permission = $permission;
    }


}
