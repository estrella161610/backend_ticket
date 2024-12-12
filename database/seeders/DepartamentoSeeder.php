<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('departamentos')->insert([
            'id_sede' => 1,
            'nombre' => 'Departamento A',
            'descripcion' => 'Descripción del Departamento A',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('departamentos')->insert([
            'id_sede' => 2,
            'nombre' => 'Departamento B',
            'descripcion' => 'Descripción del Departamento B',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('departamentos')->insert([
            'id_sede' => 3,
            'nombre' => 'Departamento C',
            'descripcion' => 'Descripción del Departamento C',
            'estatus' => 1,
            'created_at' => $now // Timestamp actual
        ]);
    }
}
