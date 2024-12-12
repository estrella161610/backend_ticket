<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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

            $admin = Admin::where('email', $request->email)->first();


            if (!$admin || ! Hash::check($request->password, $admin->password)) {
                return response()->json(['message' => 'Las credenciales no coinciden.'], 401);
            }

            if ($admin->estatus == 0) {
                return response()->json(['message' => 'Usuario inactivo'], 401);
            }

            $token = $admin->createToken('token-name')->plainTextToken;



            return response()->json(['token' => $token, 'admin' => $admin], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al iniciar sesion', 'error' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        try {

            $query = Admin::where('estatus', 1);

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

            $admin = $query->get();

            if ($admin->isEmpty()) {
                return response()->json(['message' => 'No se encontraron admins'], 404);
            }

            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los admins', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $admin = Admin::create($request->all());
            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id) //actualizar
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->update($request->all());
            return response()->json($admin, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el admin', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id) //eliminar
    {
        try {
            $admin = Admin::findOrFail($id);

            $admin->estatus = 0;

            $admin->save();
            return response()->json(['message' => 'Admin eliminado con exito'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el admin', 'error' => $e->getMessage()], 500);
        }
    }

}
