<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_admin',
        'nombre',
        'dato_sede',
        'contacto_sede',
        'estatus'
    ];

    protected function casts(): array
    {
        return [
            'dato_sede' => 'array',
            'contacto_sede' => 'array',
        ];
    }

    public function admin()
    {
        return $this->belongsTo(Sede::class, 'id_admin');
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'id_sede');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_sede');
    }

    public function agentes()
    {
        return $this->hasMany(Agente::class, 'id_sede');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_sede');
    }
    
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_sede');
    }
}
