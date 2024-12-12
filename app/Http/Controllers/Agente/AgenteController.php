<?php

namespace App\Http\Controllers\Agente;

use App\Http\Controllers\Controller;
use App\Models\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgenteController extends Controller
{

    public function login(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',

            ]);
            $agente = Agente::where('email', $request->email)->first();


            if (!$agente || ! Hash::check($request->password, $agente->password)) {
                return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
            }

            if ($agente->estatus == 0) {
                return response()->json(['message' => 'Usuario inactivo'], 401);
            }

            $token = $agente->createToken('token-name')->plainTextToken;

            return response()->json(['token' => $token, 'admin' => $agente], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al iniciar sesion', 'error' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        try {

            $query = Agente::where('estatus', 1);

            if ($request->has('desde') && $request->has('hasta')){
                $desde = $request->input('desde');
                $hasta = $request->input('hasta');

                $query->whereBetween('created_at', [$desde, $hasta]);
            }

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('nombre', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            }

            $agente = $query->get();

            if ($agente->isEmpty()) {
                return response()->json(['message' => 'No se encontraron agentes'], 404);
            }

            return response()->json($agente, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los agentes', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $agente = Agente::create($request->all());
            return response()->json($agente, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al crear el agente', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try{
            $agente = Agente::findOrFail($id);
            return response()->json($agente, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al obtener el agente', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id) //actualizar
    {
        try {
            $agente = Agente::findOrFail($id);
            $agente->update($request->all());
            return response()->json($agente, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el agente', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) //eliminar
    {
        try {
            $agente = Agente::findOrFail($id);

            $agente->estatus = 0;

            $agente->save();
            return response()->json(['message' => 'Agente eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el agente', 'error' => $e->getMessage()], 500);
        }
    }
}
