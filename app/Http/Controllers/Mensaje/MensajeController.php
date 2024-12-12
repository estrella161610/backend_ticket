<?php

namespace App\Http\Controllers\Mensaje;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function mostrarMensajes($id)
    {
        $ticket = Ticket::findOrFail($id);
        $mensajes = $ticket->mensajes;
        return response()->json(['ticket' => $ticket, 'mensajes' => $mensajes]);
    }

    public function enviarMensajes(Request $request)
    {
        try{
            $mensaje = Mensaje::create($request->all());
            return response()->json(['message' => 'Mensaje enviado exitosamente','mensaje' => $mensaje], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener al enviar mensaje', 'error' => $e->getMessage()], 500);
        }
    }

}
