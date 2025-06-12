<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'enderecos')]
class Endereco
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $logradouro;

    #[ORM\ManyToOne(targetEntity: Empresa::class, inversedBy: 'enderecos')]
    #[ORM\JoinColumn(name: 'empresa_id', referencedColumnName: 'id', nullable: false)]
    private Empresa $empresa;

    public function getId(): int { return $this->id; }
    public function getLogradouro(): string { return $this->logradouro; }
    public function setLogradouro(string $logradouro): void { $this->logradouro = $logradouro; }

    public function getEmpresa(): Empresa { return $this->empresa; }
    public function setEmpresa(Empresa $empresa): void { $this->empresa = $empresa; }
}

