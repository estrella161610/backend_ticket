<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mensajes')->insert([
            'id_ticket' => 1,
            'emisor_id' => 1,
            'emisor_type' => 'Agente',
            'descripcion' => 'Descripción del mensaje 1',
            'mensaje' => 'Este es el mensaje 1.',
        ]);

        DB::table('mensajes')->insert([
            'id_ticket' => 2,
            'emisor_id' => 2,
            'emisor_type' => 'Agente',
            'descripcion' => 'Descripción del mensaje 2',
            'mensaje' => 'Este es el mensaje 2.',
        ]);

        DB::table('mensajes')->insert([
            'id_ticket' => 3,
            'emisor_id' => 3,
            'emisor_type' => 'Agente',
            'descripcion' => 'Descripción del mensaje 3',
            'mensaje' => 'Este es el mensaje 3.',
        ]);

        DB::table('mensajes')->insert([
            'id_ticket' => 1,
            'emisor_id' => 1,
            'emisor_type' => 'Cliente',
            'descripcion' => 'Descripción del mensaje 1',
            'mensaje' => 'Este es el mensaje 1.',
        ]);

        DB::table('mensajes')->insert([
            'id_ticket' => 2,
            'emisor_id' => 2,
            'emisor_type' => 'Cliente',
            'descripcion' => 'Descripción del mensaje 2',
            'mensaje' => 'Este es el mensaje 2.',
        ]);

        DB::table('mensajes')->insert([
            'id_ticket' => 3,
            'emisor_id' => 3,
            'emisor_type' => 'Cliente',
            'descripcion' => 'Descripción del mensaje 3',
            'mensaje' => 'Este es el mensaje 3.',
        ]);
    }
}
