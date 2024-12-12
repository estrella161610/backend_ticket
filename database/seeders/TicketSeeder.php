<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('tickets')->insert([
            // Ticket 1
            [
                'id_sede' => 1,
                'id_cliente' => 1,
                'id_agente' => 1,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => 'Consulta sobre producto',
                'estado_ticket' => 'nuevo',
                'asunto' => 'Pregunta general sobre producto',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual
            ],
            // Ticket 2
            [
                'id_sede' => 2,
                'id_cliente' => 2,
                'id_agente' => 2,
                'id_tipo_ticket' => 2,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => 'Sugerencia de mejora',
                'estado_ticket' => 'en_proceso',
                'asunto' => 'Sugerencia para mejorar la aplicación',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 3
            [
                'id_sede' => 3,
                'id_cliente' => 3,
                'id_agente' => 3,
                'id_tipo_ticket' => 3,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => 'Solicitud de información',
                'estado_ticket' => 'pendiente',
                'asunto' => 'Información adicional requerida',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 4
            [
                'id_sede' => 1,
                'id_cliente' => 1,
                'id_agente' => 1,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => 'Recomendación de producto',
                'estado_ticket' => 'resuelto',
                'asunto' => 'Recomendación para un producto nuevo',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 5
            [
                'id_sede' => 2,
                'id_cliente' => 2,
                'id_agente' => 2,
                'id_tipo_ticket' => 2,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => 'Actualización de cuenta',
                'estado_ticket' => 'cerrado',
                'asunto' => 'Actualización completada con éxito',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 6
            [
                'id_sede' => 3,
                'id_cliente' => 2,
                'id_agente' => 3,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'media',
                'nombre_ticket' => 'Problema de acceso',
                'estado_ticket' => 'nuevo',
                'asunto' => 'No se puede acceder a la cuenta',
                'estatus' => 0,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 7
            [
                'id_sede' => 1,
                'id_cliente' => 3,
                'id_agente' => 1,
                'id_tipo_ticket' => 2,
                'prioridad_ticket' => 'media',
                'nombre_ticket' => 'Error en la aplicación',
                'estado_ticket' => 'en_proceso',
                'asunto' => 'Error crítico al iniciar sesión',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 8
            [
                'id_sede' => 2,
                'id_cliente' => 1,
                'id_agente' => 2,
                'id_tipo_ticket' => 3,
                'prioridad_ticket' => 'media',
                'nombre_ticket' => 'Falla de funcionalidad',
                'estado_ticket' => 'pendiente',
                'asunto' => 'Una funcionalidad no está funcionando',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 9
            [
                'id_sede' => 3,
                'id_cliente' => 2,
                'id_agente' => 3,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'media',
                'nombre_ticket' => 'Soporte de producto',
                'estado_ticket' => 'resuelto',
                'asunto' => 'Problema resuelto por el soporte técnico',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 10
            [
                'id_sede' => 1,
                'id_cliente' => 3,
                'id_agente' => 1,
                'id_tipo_ticket' => 2,
                'prioridad_ticket' => 'media',
                'nombre_ticket' => 'Desempeño de la aplicación',
                'estado_ticket' => 'cerrado',
                'asunto' => 'Desempeño optimizado según el feedback',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 11
            [
                'id_sede' => 2,
                'id_cliente' => 1,
                'id_agente' => 2,
                'id_tipo_ticket' => 3,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Fallo en el sistema',
                'estado_ticket' => 'nuevo',
                'asunto' => 'El sistema está caído',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 12
            [
                'id_sede' => 3,
                'id_cliente' => 2,
                'id_agente' => 3,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Seguridad comprometida',
                'estado_ticket' => 'en_proceso',
                'asunto' => 'Posible brecha de seguridad',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 13
            [
                'id_sede' => 1,
                'id_cliente' => 3,
                'id_agente' => 1,
                'id_tipo_ticket' => 2,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Datos perdidos',
                'estado_ticket' => 'pendiente',
                'asunto' => 'Se han perdido datos importantes',
                'estatus' => 0,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 14
            [
                'id_sede' => 2,
                'id_cliente' => 1,
                'id_agente' => 2,
                'id_tipo_ticket' => 3,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Falla crítica del sistema',
                'estado_ticket' => 'resuelto',
                'asunto' => 'El sistema ha fallado críticamente',
                'estatus' => 0,
                'created_at' => $now, // Timestamp actual

            ],
            // Ticket 15
            [
                'id_sede' => 3,
                'id_cliente' => 2,
                'id_agente' => 3,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Hackeo detectado',
                'estado_ticket' => 'cerrado',
                'asunto' => 'Hackeo detectado y corregido',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            //Tickets sin agentes asignados
            //Ticket 16
            [
                'id_sede' => 1,
                'id_cliente' => 2,
                'id_agente' => null,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Problemas con Epicard',
                'estado_ticket' => 'nuevo',
                'asunto' => 'Problemas de carga de redes sociales',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            //Ticket 17
            [
                'id_sede' => 2,
                'id_cliente' => 1,
                'id_agente' => null,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'alta',
                'nombre_ticket' => 'Problemas de inicio de sesion',
                'estado_ticket' => 'nuevo',
                'asunto' => 'Hackeo detectado y corregido',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual

            ],
            //Ticket 18
            [
                'id_sede' => 3,
                'id_cliente' => 3,
                'id_agente' => null,
                'id_tipo_ticket' => 1,
                'prioridad_ticket' => 'baja',
                'nombre_ticket' => ' Problemas de espacio',
                'estado_ticket' => 'nuevo',
                'asunto' => 'Almacenamiento ya se encuentra lleno',
                'estatus' => 1,
                'created_at' => $now, // Timestamp actual
                
            ]
        ]);
    }
}
