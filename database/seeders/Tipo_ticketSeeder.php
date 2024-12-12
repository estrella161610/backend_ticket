<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_ticketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_tickets')->insert([
            ['id' => 1, 'nombre' => 'Soporte Técnico'],
            ['id' => 2, 'nombre' => 'Consulta de Producto'],
            ['id' => 3, 'nombre' => 'Problema de Facturación'],
        ]);
    }
}
