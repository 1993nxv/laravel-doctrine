<?php

namespace App\Http\Controllers;

use App\Services\EmpresaService;
use Illuminate\Http\JsonResponse;

class EmpresaController extends Controller
{
    private EmpresaService $service;

    public function __construct(EmpresaService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $empresas = $this->service->listar();

        $data = array_map(fn($empresa) => [
            'id' => $empresa->getId(),
            'nome' => $empresa->getNome(),
            'email' => $empresa->getEmail(),
            'telefone' => $empresa->getTelefone()
        ], $empresas);

        return response()->json($data);
    }

    public function show(int $id): JsonResponse
    {
        $empresa = $this->service->buscarPorId($id);

        if (!$empresa) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        return response()->json([
            'id' => $empresa->getId(),
            'nome' => $empresa->getNome(),
            'email' => $empresa->getEmail(),
            'telefone' => $empresa->getTelefone()
        ]);
    }
}

