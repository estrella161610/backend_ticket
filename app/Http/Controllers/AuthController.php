<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
    En el controlador, agrega métodos para el registro, inicio de sesión y cierre de sesión
*/
 

class AuthController extends Controller
{

    //prueba 1 para verificar la correcta funcionalidad del controlador se manda un mensaje en localhost
    public function index()
    {
       $personal = User::all();
       return response()->json($personal);
    }

    public function show($id) //buscar 1 por id
    {
        $personal=User::findOrFail($id);
        return response()->json($personal);
    }

    public function update(Request $request, $id) //actualizar 
    {
        $personal = User::findOrFail($id);
        $personal->update($request->all());
        return response()->json($personal);
    }

    public function destroy($id) //eliminar
    {
        $personal = User::findOrFail($id);
        $personal->delete();
        return response()->json(null, 204);
    }


    //funcion para registrar un nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Asignar Rol segun el tipo de usuario
        $user->assignRole($request->role);

        //return response()->json($user, 201);
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    //funcion para login 
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
            
        ]);

        $name = User::where('name', $request->name)->first();
       

        if (!$name || ! Hash::check($request->password, $name->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
        }

        $token = $name->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token], 200);
    }

    //funcion para cerrar sesion
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}