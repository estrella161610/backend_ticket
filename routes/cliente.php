<?php

use App\Http\Controllers\Cliente\Auth\Perfil\PerfilController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Import\ClienteImport;
use Illuminate\Support\Facades\Route;


Route::prefix('cliente')->group(function () {
    Route::post('/login', [ClienteController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [PerfilController::class, 'profile']);
        Route::get('/export', [ClienteImport::class, 'export']);
        Route::put('/password', [PerfilController::class, 'cambiarPassword']);
        Route::get('/logout', [PerfilController::class, 'logout']);
        Route::get('/', [ClienteController::class, 'index']);
        Route::post('/', [ClienteController::class, 'store']);
        Route::get('/{id}', [ClienteController::class, 'show']);
        Route::put('/{id}', [ClienteController::class, 'update']);
        Route::delete('/{id}', [ClienteController::class, 'destroy']);
        Route::post('/import', [ClienteImport::class, 'import']);
    });
});

