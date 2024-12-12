<?php

namespace App\Http\Controllers\Departamento;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;


class DepartamentoController extends Controller
{

    public function index(Request $request)
    {
        try {

            $query = Departamento::where('estatus', 1);

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

            $departamentos = $query->get();

            if ($departamentos->isEmpty()) {
                return response()->json(['message' => 'No se encontraron departamentos'], 404);
            }

            return response()->json($departamentos, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los departamentos', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $departamentos = Departamento::create($request->all());
            return response()->json($departamentos, 200);
        } catch (\Exception $e) {
            return response()->json(['messagee' => 'Error al crear el departamento', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $departamentos = Departamento::findOrFail($id);
            return response()->json($departamentos, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el departamento', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $departamentos = Departamento::findOrFail($id);
            $departamentos->update($request->all());
            return response()->json($departamentos, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el departamento', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $departamentos = Departamento::findOrFail($id);

            $departamentos->estatus = 0;

            $departamentos->save();
            return response()->json(['message' => 'departamento eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el departamento', 'error' => $e->getMessage()], 500);
        }
    }

}
