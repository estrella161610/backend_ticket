<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Ticket extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_sede',
        'id_cliente',
        'id_agente',
        'prioridad_ticket',
        'id_tipo_ticket',
        'nombre_ticket',
        'estado_ticket',
        'asunto',
        'estatus'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class, 'id_agente');
    }

    public function tipoTicket()
    {
        return $this->belongsTo(TipoTicket::class, 'id_tipo_ticket');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

     public function mensajes()
    {
        return $this->hasMany(Mensaje::class, 'id_ticket');
    }
}
