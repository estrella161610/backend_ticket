<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = Carbon::now();

        DB::table('grupos')->insert([
            'id_sede' => 1,
            'id_departamento' => 1,
            'nombre' => 'Grupo A',
            'descripcion' => 'Descripción del Grupo A',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('grupos')->insert([
            'id_sede' => 2,
            'id_departamento' => 2,
            'nombre' => 'Grupo B',
            'descripcion' => 'Descripción del Grupo B',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('grupos')->insert([
            'id_sede' => 3,
            'id_departamento' => 3,
            'nombre' => 'Grupo C',
            'descripcion' => 'Descripción del Grupo C',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);

    }
}
