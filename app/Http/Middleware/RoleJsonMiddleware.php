<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleJsonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Usuario no autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        if (!auth()->user()->hasAnyRole($roles)) {
            return response()->json(['error' => 'No tienes permisos para acceder a esta ruta'], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
