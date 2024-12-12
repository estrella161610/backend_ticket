<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_sede',
        'id_departamento',
        'nombre',
        'descripcion',
        'estatus',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function agentes()
    {
        return $this->hasMany(Agente::class, 'id_grupo');
    }
}
