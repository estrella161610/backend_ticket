<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Cliente extends Model
{
    use HasFactory;
    use HasRoles;
    use HasApiTokens;

    protected $table = 'clientes';
    protected $guard_name = 'clientes';
    protected $fillable = [
        'id_usuario',
        'id_sede',
        'icono',
        'nombre_completo',
        'nombre_corto',
        'telefono',
        'email',
        'password',
        'observaciones',
        'estatus',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function agente()
    {
        return $this->belongsTo(Agente::class, 'id_usuario');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_cliente');
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
