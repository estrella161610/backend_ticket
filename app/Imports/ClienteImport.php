<?php

namespace App\Imports;


use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClienteImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cliente([
        'id_usuario' => $row['id_usuario'],
        'id_sede' => $row['id_sede'],
        'nombre_completo' => $row['nombre_completo'],
        'nombre_corto' => $row['nombre_corto'],
        'telefono' => $row['telefono'],
        'email' => $row['email'],
        'password' => $row['password'],
        'observaciones' => $row['observaciones'],
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }
}
