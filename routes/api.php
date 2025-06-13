<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('empresas')->group(function () {
        Route::get('/', [EmpresaController::class, 'index']);
        Route::get('/{id}', [EmpresaController::class, 'show']);
    });
});