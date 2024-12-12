<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function login(Request $request)
    {

        try {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo debe ser un correo valido',
            'password.required' => 'La contraseña es obligatoria',
        ]);

        $cliente = Cliente::where('email', $request->email)->first();

        if (!$cliente || !Hash::check($request->password, $cliente->password)) {
            return response()->json(['message' => 'Las credenciales no coinciden'], 401);
        }

        if ($cliente->estatus == 0) {
            return response()->json(['message' => 'Usuario inactivo'], 401);
        }

        $token = $cliente->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token, 'cliente' => $cliente], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error al iniciar sesion', 'error' => $e->getMessage()], 500);
    }
    }

    public function index(Request $request)
    {
        try {

            $query = Cliente::where('estatus', 1);

            if ($request->has('desde') && $request->has('hasta')){
                $desde = $request->input('desde');
                $hasta = $request->input('hasta');

                $query->whereBetween('created_at', [$desde, $hasta]);
            }

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('nombre_completo', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            }

            $cliente = $query->get();

            if($cliente->isEmpty()){
                return response()->json(['message' => 'No se encontraron clientes'], 404);
            }

            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los clientes', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $cliente = Cliente::create($request->all());
            return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al crear el cliente', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try{

            $cliente = Cliente::FindOrFail($id);
            return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al obtener el cliente', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $cliente = Cliente::FindOrFail($id);
            $cliente->update($request->all());
            return response()->json($cliente, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al actualizar el cliente', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
        $cliente = Cliente::findOrFail($id);

        $cliente->estatus = 0;

        $cliente->save();
        return response()->json(['message' => 'Cliente eliminado correctamente',], 201);
        }catch(\Exception $e){
            return response()->json(['message' => 'Error al eliminar el cliente', 'error' => $e->getMessage()], 500);
        }
    }
}
