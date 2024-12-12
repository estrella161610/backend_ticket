<?php

use App\Http\Controllers\Admin\Inicio\HomeController;
use App\Http\Controllers\Admin\Inicio\PanelController;
use App\Http\Controllers\Agente\Bandeja\BandejaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Fortify::requestPasswordResetLinkView(function () {
    return view('auth.passwords.email');
});

Fortify::resetPasswordView(function ($request) {
    return view('auth.passwords.reset', ['request' => $request]);
});


Route::prefix('bandeja')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/sus-tickets-sin-resolucion', [BandejaController::class, 'susTicketsSinResolver']);
        Route::get('/sin-asignacion', [BandejaController::class, 'ticketsSinAsignar']);
        Route::get('/tickets-sin-resolucion', [BandejaController::class, 'index']);
        Route::get('/recien-actualizados', [BandejaController::class, 'recienActualizados']);
        Route::get('/pendientes', [BandejaController::class, 'pendientes']);
        Route::get('/recien-resueltos', [BandejaController::class, 'ticketsRecienResueltos']);
        Route::get('/borrados', [BandejaController::class, 'borrados']);
    });
});




Route::prefix('inicio')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/home/estadisticas', [HomeController::class, 'estadisticasTickest']);
        Route::get('/panel/resumen', [PanelController::class, 'resumenTickets']);
    });
});


// mandar las rutas que correpsonden a su ruta, por ejemplo
// clienteController a cliente.php

require base_path('routes/admin.php');
require base_path('routes/cliente.php');
require base_path('routes/agente.php');
require base_path('routes/grupo.php');
require base_path('routes/departamento.php');
require base_path('routes/ticket.php');
require base_path('routes/sede.php');
