<?php

use App\Http\Controllers\Admin\Sede\SedeController;
use App\Http\Controllers\Import\SedeImport;
use Illuminate\Support\Facades\Route;

Route::prefix('sede')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [SedeController::class, 'index']);
        Route::post('/', [SedeController::class, 'store']);
        Route::get('/export', [SedeImport::class, 'export']);
        Route::get('/{id}', [SedeController::class, 'show']);
        Route::put('/{id}', [SedeController::class, 'update']);
        Route::delete('/{id}', [SedeController::class, 'destroy']);
        Route::post('/import', [SedeImport::class, 'import']);
        Route::get('/{id}/departamento', [SedeController::class, 'filtrarDepartamentosPorSede']);
    });
});
