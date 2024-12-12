<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Http\Requests\Tickets\TicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request)
    {
        try{

            $query = Ticket::where('estatus', 1);

            if ($request->has('desde') && $request->has('hasta')){
                $desde = $request->input('desde');
                $hasta = $request->input('hasta');

                $query->whereBetween('created_at', [$desde, $hasta]);
            }

            $ticket = $query->get();

        if ($ticket->isEmpty()){
            return response()->json(['message' => 'No se encontraron tickest'], 404);
        }

        return response()->json( $ticket, 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al obtener los tickets.', 'error' => $e->getMessage()], 500);
    }

    }


    public function store(Request $request)
    {
        try {
            $ticket = Ticket::create($request->all());
            return response()->json($ticket, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el ticket', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            return response()->json($ticket, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener ticket', 'error' => $e->getMessage()], 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $tickest = Ticket::findOrFail($id);
            $tickest->update($request->all());
            return response()->json($tickest, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el departamento', 'error' => $e->getMessage()], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $ticket = Ticket::findOrFail($id);

            $ticket->estatus = 0;

            $ticket->save();
            return response()->json(['message' => 'Ticket eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el ticket', 'error' => $e->getMessage()], 500);
        }
    }
}
