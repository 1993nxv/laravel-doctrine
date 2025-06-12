<?php

namespace App\Repositories;

interface EmpresaRepositoryInterface
{
    public function findAll(): array;
    public function findById(int $id): ?\App\Entities\Empresa;
}