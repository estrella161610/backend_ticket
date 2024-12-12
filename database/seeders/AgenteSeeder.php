<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgenteSeeder extends Seeder
{

    public function run(): void
    {

        $now = Carbon::now();

        DB::table('agentes')->insert([
            [
                'id_sede' => 1,
                'id_departamento' => 1,
                'id_grupo' => 1,
                'icono' => 'icono_agente1.png',
                'nombre' => 'Agente Uno',
                'email' => 'agente@agente.com',
                'password' => Hash::make('password'),
                'telefono' => '331312345',
                'estado_agente' => 'activo',
                'estatus' => 1,
                'created_at' => $now // Timestamp actual
            ],
            [
                'id_sede' => 2,
                'id_departamento' => 2,
                'id_grupo' => 2,
                'icono' => 'icono_agente2.png',
                'nombre' => 'Agente Dos',
                'email' => 'agente1@agente.com',
                'password' => Hash::make('password'),
                'telefono' => '332223344',
                'estado_agente' => 'activo',
                'estatus' => 1,
                'created_at' => $now // Timestamp actual
            ],
            [
                'id_sede' => 3,
                'id_departamento' => 3,
                'id_grupo' => 3,
                'icono' => 'icono_agente3.png',
                'nombre' => 'Agente Tres',
                'email' => 'agente2@agente.com',
                'password' => Hash::make('password'),
                'telefono' => '333334455',
                'estado_agente' => 'activo',
                'estatus' => 1,
                'created_at' => $now // Timestamp actual
            ]
        ]);
    }
}
