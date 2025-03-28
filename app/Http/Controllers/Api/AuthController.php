<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user = Auth::user();

        // Revocar tokens anteriores y generar uno nuevo
        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()
        ]);
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
    public function refresh(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()

        ]);
    }
    public function me(Request $request)
    {
        $user = Auth::user();
        return response()->json([
            'user' => $user->only(['id', 'name', 'email']),
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()

        ]);
    }
}
