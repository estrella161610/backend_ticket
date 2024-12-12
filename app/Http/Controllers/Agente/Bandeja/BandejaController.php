<?php

namespace App\Http\Controllers\Agente\Bandeja;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BandejaController extends Controller
{
    public function susTicketsSinResolver()
    {
        try {
            $infoUser = Auth::user();

            $tickets = Ticket::where('id_agente', $infoUser->id)
                ->whereIn('estado_ticket', ['nuevo', 'en_proceso', 'pendiente'])
                ->where('estatus', 1)
                ->get();

                return response()->json( $tickets, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener tus tickets sin resolver',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function ticketsSinAsignar()
    {
        try {
            $tickets = Ticket::whereNull('id_agente')->get();

            if ($tickets->isEmpty()) {
                return response()->json(['message' => 'No hay tickets sin asignar'], 404);
            }

            return response()->json($tickets, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener tickets sin asignar', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        try {
            $tickets = Ticket::whereIn('estado_ticket', ['nuevo', 'en_proceso', 'pendiente'])
                ->where('estatus', 1)
                ->get();

            return response()->json( $tickets, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tickets sin resolver.', 'error' => $e->getMessage()], 500);
        }
    }

    public function recienActualizados()
    {
        try {
            $hace24Horas = Carbon::now()->subDay();

            $tickets = Ticket::where('updated_at', '>=', $hace24Horas)
                ->where('estatus', 1)
                ->get();

            return response()->json($tickets, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tickets recién actualizados', 'error' => $e->getMessage()], 500);
        }
    }

    public function pendientes()
    {
        try {
            $tickets = Ticket::where('estado_ticket', 'pendiente')
                ->where('estatus', 1)
                ->get();

            return response()->json( $tickets, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tickets pendientes.', 'error' => $e->getMessage()], 500);
        }
    }

    public function ticketsRecienResueltos()
    {
        try {
            $tickets = Ticket::where('estado_ticket', 'resuelto')
                ->where('updated_at', '>=', Carbon::now()->subDays(7))
                ->where('estatus', 1)
                ->get();

            return response()->json($tickets, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tickets recientemente resueltos.', 'error' => $e->getMessage()], 500);
        }
    }

    public function borrados()
    {
        try {
            $tickets = Ticket::where('estatus', 0)->get();

            if ($tickets->isEmpty()) {
                return response()->json(['message' => 'No se encontraron tickets eliminados'], 404);
            }

            return response()->json(['tickets' => $tickets], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tickets eliminados', 'error' => $e->getMessage()], 500);
        }
    }
}
