<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{

    public function run(): void
    {

        $now = Carbon::now();

        DB::table('clientes')->insert([
            'id_usuario' => 1,
            'id_sede' => 1,
            'icono' => 'icono_cliente1',
            'nombre_completo' => 'Cliente Uno',
            'nombre_corto' => 'Uno',
            'telefono' => 9622362374,
            'email' => 'cliente@cliente.com',
            'password' => Hash::make('password'),
            'observaciones' => 'Observaciones para cliente Uno',
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('clientes')->insert([
            'id_usuario' => 2,
            'id_sede' => 2,
            'icono' => 'icono_cliente2',
            'nombre_completo' => 'Cliente Dos',
            'nombre_corto' => 'Dos',
            'telefono' => 9622374274,
            'email' => 'cliente1@cliente.com',
            'password' => Hash::make('password'),
            'observaciones' => 'Observaciones para cliente Dos',
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('clientes')->insert([
            'id_usuario' => 3,
            'id_sede' => 3,
            'icono' => 'icono_cliente3',
            'nombre_completo' => 'Cliente Tres',
            'nombre_corto' => 'Tres',
            'telefono' => 9665262374,
            'email' => 'cliente2@cliente.com',
            'password' => Hash::make('password'),
            'observaciones' => 'Observaciones para cliente Tres',
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
            ]);
    }
}
