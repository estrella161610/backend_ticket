<?php

namespace App\Http\Controllers\Cliente\Auth\Perfil;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{

    public function cambiarPassword(Request $request)
    {
        $infoUser = Auth::user();

        if (!$infoUser) {
            return response()->json(['message' => 'Usuario no autenticado.'], 401);
        }

        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed|min:5|max:128',
        ]);

        if (!Hash::check($request->input('password'), $infoUser->password)) {
            return response()->json(['message' => 'La contraseña actual es incorrecta.'], 400);
        }

        $infoUser->password = Hash::make($request->input('new_password'));
        $infoUser->save();

        return response()->json(['message' => 'Contraseña actualizada con exito','user' => $infoUser], 200);
    }

    public function profile()
    {

        try {
            $infoUser = Auth::user();

            if (!$infoUser) {
                return response()->json(['message' => 'No hay usuario autenticado'], 404);
            }

            return response()->json($infoUser ,200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el token', 'error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesion cerrada con exito'], 200);
    }
}
