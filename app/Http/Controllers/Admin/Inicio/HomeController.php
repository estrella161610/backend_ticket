<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function estadisticasTickest()
    {

        $semana = now()->subWeek();

        // Resolución de tickets más rápidos en la última semana(Mide el tiempo que toma resolver un ticket desde que se crea hasta que se cierra.)
        $ticketsResueltos = Ticket::where('estado_ticket', 'resuelto')
            ->where('updated_at', '>=', $semana)
            ->selectRaw('COUNT(*) as count, AVG(TIMESTAMPDIFF(MINUTE, created_at, updated_at)) as avg_resolution_time')
            ->first();
        $totalTicketsCreados = Ticket::where('created_at', '>=', $semana)->count();
        $porcentajeSolucion = $totalTicketsCreados > 0 ? round(($ticketsResueltos->count / $totalTicketsCreados) * 100, 2) : 0;

        //Reducción del tiempo de espera de los clientes (Cuánto tiempo deben esperar los clientes desde que crean un ticket nuevo, hasta que reciben una respuesta.)
        $esperaPromedio = Ticket::where('estado_ticket', 'nuevo')
            ->where('created_at', '>=', $semana)
            ->selectRaw('AVG(TIMESTAMPDIFF(MINUTE, created_at, NOW())) as avg_wait_time')
            ->pluck('avg_wait_time')
            ->first() ?? 0;

        //Volumen de solicitudes de clientes resueltas en la última semana (Indica cuenta cuántos tickets han sido resueltos en ese periodo.)
        $solicitudesResueltas = $ticketsResueltos->count;

        return response()->json([
            'Tiempo de solucion de un ticket' => [
                'promedio' => $ticketsResueltos->avg_resolution_time ?? 0,
                'porcentaje' => $porcentajeSolucion,
            ],
            'Tiempo de espera promedio' => $esperaPromedio,
            'Total tickets resueltos en la semana' => $solicitudesResueltas,
    ]);
}

}
