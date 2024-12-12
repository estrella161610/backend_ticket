<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('admins')->insert([
            'nombre' => 'Administrador de prueba 1',
            'telefono' => '4441457890',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('admins')->insert([
            'nombre' => 'Administrador 2',
            'telefono' => '8161234567',
            'email' => 'admin1@admin.com',
            'password' => Hash::make('password'),
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
        ]);

        DB::table('admins')->insert([
            'nombre' => 'Administrador 3',
            'telefono' => '816345367',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('password'),
            'estatus'=> 1,
            'created_at' => $now // Timestamp actual
        ]);

    }
}
