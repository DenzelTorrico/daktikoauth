<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        //lógica para el estudiante
        return response()->json(['message' => 'Bienvenido Estudiante']);
    }
}
