<?php

use App\Http\Controllers\Mensaje\MensajeController;
use App\Http\Controllers\Ticket\TicketController;
use Illuminate\Support\Facades\Route;

Route::prefix('ticket')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [TicketController::class, 'index']);
        Route::post('/', [TicketController::class, 'store']);
        Route::get('/{id}', [TicketController::class, 'show']);
        Route::put('/{id}', [TicketController::class, 'update']);
        Route::delete('/{id}', [TicketController::class, 'destroy']);

        Route::post('/mensajes', [MensajeController::class, 'enviarMensajes']);
        Route::get('/mensajes/{id}', [MensajeController::class, 'mostrarMensajes']);
    });
});
