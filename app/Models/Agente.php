<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Agente extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'agentes';
    protected $primaryKey = 'id';
    protected $guard_name = 'agentes';
    protected $fillable = [
        'id_sede',
        'id_departamento',
        'id_grupo',
        'icono',
        'nombre',
        'email',
        'password',
        'telefono',
        'estado_agente',
        'estatus'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_agente');
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_usuario');
    }

    public function mensajes()
    {
        return $this->morphMany(Mensaje::class, 'emisor');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
