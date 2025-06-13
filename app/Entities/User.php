<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User implements JWTSubject, AuthContract
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', unique: true)]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $password;

    // Métodos obrigatórios do Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // Ou implemente se usar "lembrar-me"
    }

    public function setRememberToken($value) {}
    public function getRememberTokenName() {}

    // Métodos do JWTSubject (mantidos)
    public function getJWTIdentifier() { return $this->id; }
    public function getJWTCustomClaims() { return []; }

    // Getters/Setters
    public function getId(): int { return $this->id; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $password): void { $this->password = bcrypt($password); }
}