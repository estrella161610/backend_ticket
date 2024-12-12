<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTicket extends Model
{
    use HasFactory;

    protected $table = 'tipo_tickets';
    protected $primaryKey = 'id';
    protected $fillable = 'nombre';

     public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_tipo_ticket');
    }
}
