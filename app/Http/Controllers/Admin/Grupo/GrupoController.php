<?php

namespace App\Http\Controllers\Admin\Grupo;

use App\Http\Controllers\Controller;
use App\Models\Agente;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class GrupoController extends Controller
{

    public function index(Request $request)
    {
        try {

            $query = Grupo::where('estatus', 1);

            if ($request->has('desde') && $request->has('hasta')){
                $desde = $request->input('desde');
                $hasta = $request->input('hasta');

                $query->whereBetween('created_at', [$desde, $hasta]);
            }

            if ($request->has('search')){
                $search = $request->input('search');
                $query->where(function ($q) use ($search){
                    $q->where('nombre', 'like', "%$search");
                });
            }

            $grupo = $query->get();

            if ($grupo->isEmpty()) {
                return response()->json(['message' => 'No se encontraron grupos'], 404);
            }

            return response()->json($grupo, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los grupos', 'error' => $e->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $admin = Grupo::create($request->all());
            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el grupo', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);
            $grupo->update($request->all());
            return response()->json($grupo, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el grupo', 'error' => $e->getMessage()], 500);
        }
    }


    public function destroy(string $id)
    {
        try {
            $grupo = Grupo::findOrFail($id);

            $grupo->estatus = 0;

            $grupo->save();
            return response()->json(['message' => 'Grupo eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el Grupo', 'error' => $e->getMessage()], 500);
        }
    }

    public function totalGrupos()
        {
            $total = Grupo::where('estatus', 1)->count();

            return response()->json(['total_grupos' => $total], 200);
        }

    public function totalPersonasEnGrupo($id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo || $grupo->estatus != 1) {
            return response()->json([
            'message' => 'Grupo no encontrado o inactivo',
            'status' => 404]
            , 404);
        }

        $totalPersonas = Agente::where('id_grupo', $id)->count();

        return response()->json(['total_personas' => $totalPersonas], 200);    }

}
