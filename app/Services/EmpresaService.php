<?php

namespace App\Services;

use App\Entities\Empresa;
use App\Repositories\EmpresaRepositoryInterface;

class EmpresaService
{
    private EmpresaRepositoryInterface $repository;

    public function __construct(EmpresaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listar(): array
    {
        return $this->repository->findAll();
    }

    public function buscarPorId(int $id): ?Empresa
    {
        return $this->repository->findById($id);
    }
}