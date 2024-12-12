<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'admins';
    protected $guard_name = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'password',
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

    public function sedes()
    {
        return $this->hasMany(Admin::class, 'id_admin');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
