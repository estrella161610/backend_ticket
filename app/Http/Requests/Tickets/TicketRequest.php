<?php

namespace App\Http\Requests\Tickets;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_agente' => 'required|exists:agentes,id_agente',
            'prioridad_ticket' => 'required|in:baja,media,alta',
            'id_tipo_ticket' => 'required|exists:tipo_tickets,id_tipo_ticket',
            'nombre_ticket' => 'required|min:3|max:100|regex:/^[a-zA-Z\s]+$/',
            'estado_ticket' => 'required|in:nuevo,en_proceso,pendiente,resuelto,cerrado',
            'asunto' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'id_cliente.required' => 'El id_cliente es obligatorio.',
        'id_cliente.exists' => 'El id_cliente no existe en la base de datos.',
        'id_agente.required' => 'El id_agente es obligatorio.',
        'id_agente.exists'  => 'El id_agente no existe en la base de datos.',
        'prioridad_ticket.required' => 'La prioridad del ticket es obligatoria.',
        'prioridad_ticket.in' => 'La prioridad del ticket debe ser uno de: baja, media, alta.',
        'id_tipo_ticket.required' => 'El id_tipo_ticket es obligatorio.',
        'id_tipo_ticket.exists' => 'El id_tipo_ticket no existe en la base de datos.',
        'nombre_ticket.required' => 'El nombre del ticket es obligatorio.',
        'nombre_ticket.min' => 'El nombre del ticket debe tener al menos: 2 caracteres.',
        'nombre_ticket.max' => 'El nombre del ticket no puede tener más de: 100 caracteres.',
        'nombre_ticket.regex' => 'El nombre del ticket solo debe contener letras y espacios',
        'estado_ticket.required' => 'El estado del ticket es obligatorio.',
        'estado_ticket.in' => 'El estado del ticket debe ser uno de: nuevo, en_proceso, pendiente, resuelto, cerrado.',
        'asunto.required' => 'El asunto es obligatorio.',
        'asunto.max' => 'El asunto no puede tener más de:255 caracteres.',
        ];
    }
}
