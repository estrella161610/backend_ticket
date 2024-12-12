<?php

namespace App\Http\Controllers\Admin\Inicio;

use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Models\Ticket;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function resumenTickets(Request $request)
    {
        $userId = $request->user()->id;
        // Obtén el agente, si existe
    $agente = Agente::find($userId);

    // Carga los tickets según si el usuario es un agente o un cliente
    $tickets = Ticket::with(['cliente', 'agente.grupo'])
        ->when($agente, function ($query) use ($agente) {
            return $query->where('id_agente', $agente->id);
        }, function ($query) use ($userId) {
            return $query->where('id_cliente', $userId);
        })
        ->get();

    // Formatear la respuesta
    $result = $tickets->map(function ($ticket) {
        return [
            'id_ticket' => $ticket->id,
            'asunto' => $ticket->asunto,
            'estado_ticket' => $ticket->estado_ticket,
            'solicitante' => optional($ticket->cliente)->nombre_completo ?? 'Sin nombre',
            // Acceder directamente al grupo sin pluck
            'grupo' => optional($ticket->agente->grupo)->nombre ?? 'Sin grupo',
            'agente_asignado' => optional($ticket->agente)->nombre ?? 'Sin agente',
        ];
    });

    return response()->json(['tickets' => $result]);
}
}
