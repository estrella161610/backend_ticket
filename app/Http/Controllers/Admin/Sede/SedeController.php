<?php

namespace App\Http\Controllers\Admin\Sede;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{

    public function index(Request $request)
    {
        try {

            $query = Sede::where('estatus', 1);

            if ($request->has('desde') && $request->has('hasta')){
                $desde = $request->input('desde');
                $hasta = $request->input('hasta');

                $query->whereBetween('created_at', [$desde, $hasta]);
            }

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('nombre', 'like', "%$search%");
                });
            }

            $sede = $query->get();

            if ($sede->isEmpty()){
                return response()->json(['message' => 'No se encontraron admins'], 404);
            }

            return response()->json( $sede, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los sedes.', 'error' => $e->getMessage()], 500);
        }
    }


    public function filtrarDepartamentosPorSede($id)
{
    try {
        $sede = Sede::with('departamentos')->findOrFail($id);
        return response()->json($sede->departamentos, 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al obtener departamentos', 'error' => $e->getMessage()], 500);
    }
}

    public function store(Request $request)
    {
        try {
            $sede = Sede::create($request->all());
            return response()->json($sede, 200);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la sede', 'error' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        try{
            $sede = Sede::findOrFail($id);
            return response()->json($sede, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la sede', 'error' => $e->getMessage()], 500);
        }
    }


    public function update(Request $request, $id)
{
    try {

        $sede = Sede::findOrFail($id);
        $sede->update($request->all());
        return response()->json($sede, 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al actualizar la sede', 'error' => $e->getMessage()], 500);
    }
}

    public function destroy(string $id)
    {
        try {
            $sede = Sede::findOrFail($id);

            $sede->estatus = 0;

            $sede->save();
            return response()->json(['message' => 'Sede eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la sede', 'error' => $e->getMessage()], 500);
        }
    }
}
