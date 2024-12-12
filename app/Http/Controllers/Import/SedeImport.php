<?php

namespace App\Http\Controllers\Import;

use App\Exports\SedesExport;
use App\Http\Controllers\Controller;
use App\Imports\SedeImport as ImportsSedeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SedeImport extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx'
        ]);

        try {
            Excel::import(new ImportsSedeImport, $request->file('file'));

            return response()->json(['message' => 'Archivo importado con éxito.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al importar el archivo', 'error' => $e->getMessage()], 500);
        }
    }

    public function export()
    {
        try{
            return Excel::download(new SedesExport, 'sedes.xlsx');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al exportar el archivo', 'error' => $e->getMessage()], 500);
        }
    }
}