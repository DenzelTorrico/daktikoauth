<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function reporte(){
        //lógica para el reporte
        return response()->json(['message' => 'Envio de Reporte']);
    }
    public function excel(){
        //lógica para el excel
        return response()->json(['message' => 'Envio de Excel']);
    }
}
