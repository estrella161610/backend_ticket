<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sedes')->insert([
            ['nombre' => 'Sede Queretaro'],
            ['nombre' => 'Sede Ciudad de Mexico'],
            ['nombre' => 'Sede Guadalajara']
        ]);

    }
}
    