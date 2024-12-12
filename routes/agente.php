<?php

use App\Http\Controllers\Agente\AgenteController;
use App\Http\Controllers\Agente\Auth\Perfil\PerfilController;
use Illuminate\Support\Facades\Route;


Route::prefix('agente')->group(function () {
    Route::post('/login', [AgenteController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile', [PerfilController::class, 'profile']);
        Route::put('/password', [PerfilController::class, 'cambiarPassword']);
        Route::get('/logout', [PerfilController::class, 'logout']);
        Route::get('/', [AgenteController::class, 'index']);
        Route::post('/', [AgenteController::class, 'store']);
        Route::get('/{id}', [AgenteController::class, 'show']);
        Route::put('/{id}', [AgenteController::class, 'update']);
        Route::delete('/{id}', [AgenteController::class, 'destroy']);
    });
});
