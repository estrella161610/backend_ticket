<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SedesSeeder::class,
            Tipo_ticketSeeder::class,
            AdminSeeder::class,
            DepartamentoSeeder::class,
            GrupoSeeder::class,
            AgenteSeeder::class,
            ClienteSeeder::class,
            TicketSeeder::class,
            RoleSeeder::class,
            MensajeSeeder::class
        ]);

        // User::factory()->create();
        // $this->call(RoleSeeder::class);
    }
}
