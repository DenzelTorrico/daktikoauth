<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
            );
        $user->assignRole('estudiante'); // Asignar el rol de estudiante al nuevo usuario
        $token = $user->createToken('auth_token')->plainTextToken; // Generar un token de acceso
        return response()->json([
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $user->getRoleNames()
        ]);
    }
}
