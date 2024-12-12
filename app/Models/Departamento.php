<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_sede',
        'nombre',
        'descripcion',
        'estatus',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_departamento');
    }

    public function agentes()
    {
        return $this->hasMany(Agente::class, 'id_departamento');
    }
}
