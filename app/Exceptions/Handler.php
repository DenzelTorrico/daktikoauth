<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
          // Si el token es inválido o ha expirado
    if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
        return response()->json([
            'error' => 'Token inválido o sesión expirada. Inicia sesión nuevamente.'
        ], 401);
    }

    // Si el usuario no tiene acceso a la ruta protegida
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException) {
        return response()->json([
            'error' => 'Acceso denegado. No tienes los permisos necesarios.'
        ], 403);
    }

    // Si hay algún otro error relacionado con autenticación
    if ($exception instanceof \Laravel\Sanctum\Exceptions\MissingAbilityException) {
        return response()->json([
            'error' => 'No tienes permisos suficientes para realizar esta acción.'
        ], 403);
    }

    return parent::render($request, $exception);

    }
}
