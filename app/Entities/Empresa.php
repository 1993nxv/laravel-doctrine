<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'empresas')]
class Empresa
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $nome;

    #[ORM\Column(type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(type: 'string', length: 20)]
    private string $telefone;

    #[ORM\OneToMany(mappedBy: 'empresa', targetEntity: Endereco::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $enderecos;

    #[ORM\ManyToMany(targetEntity: Categoria::class, inversedBy: 'empresas', cascade: ['persist'])]
    #[ORM\JoinTable(name: 'empresa_categoria')]
    private Collection $categorias;

    public function __construct()
    {
        $this->enderecos = new ArrayCollection();
        $this->categorias = new ArrayCollection();
    }

    public function getId(): int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function getTelefone(): string { return $this->telefone; }
    public function setTelefone(string $telefone): void { $this->telefone = $telefone; }

    public function getEnderecos(): Collection { return $this->enderecos; }
    public function addEndereco(Endereco $endereco): void {
        $this->enderecos[] = $endereco;
        $endereco->setEmpresa($this);
    }

    public function getCategorias(): Collection { return $this->categorias; }
    public function addCategoria(Categoria $categoria): void {
        if (!$this->categorias->contains($categoria)) {
            $this->categorias->add($categoria);
        }
    }
}

