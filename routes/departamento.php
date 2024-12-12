<?php

use App\Http\Controllers\Departamento\DepartamentoController;
use App\Http\Controllers\Import\DepartamentoImport;
use Illuminate\Support\Facades\Route;

Route::prefix('departamento')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [DepartamentoController::class, 'index']);
        Route::post('/', [DepartamentoController::class, 'store']);
        Route::get('/export', [DepartamentoImport::class, 'export']);
        Route::get('/{id}', [DepartamentoController::class, 'show']);
        Route::put('/{id}', [DepartamentoController::class, 'update']);
        Route::delete('/{id}', [DepartamentoController::class, 'destroy']);
        Route::post('/import', [DepartamentoImport::class, 'import']);
    });
});
