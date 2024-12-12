<?php

use App\Http\Controllers\Admin\Grupo\GrupoController;
use App\Http\Controllers\Import\GrupoImport;
use Illuminate\Support\Facades\Route;


Route::prefix('grupo')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [GrupoController::class, 'index']);
        Route::post('/', [GrupoController::class, 'store']);
        Route::get('/export', [GrupoImport::class, 'export']);
        Route::put('/{id}', [GrupoController::class, 'update']);
        Route::delete('/{id}', [GrupoController::class, 'destroy']);
        Route::get('/total', [GrupoController::class, 'totalGrupos']);
        Route::get('/total-personas/{id}', [GrupoController::class, 'totalPersonasEnGrupo']);
        Route::post('/import', [GrupoImport::class, 'import']);
    });
});
