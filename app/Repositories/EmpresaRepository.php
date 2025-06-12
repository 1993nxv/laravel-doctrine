<?php

namespace App\Repositories;

use App\Entities\Empresa;
use Doctrine\ORM\EntityManagerInterface;

class EmpresaRepository implements EmpresaRepositoryInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findAll(): array
    {
        return $this->em->getRepository(Empresa::class)->findAll();
    }

    public function findById(int $id): ?Empresa
    {
        return $this->em->getRepository(Empresa::class)->find($id);
    }
}