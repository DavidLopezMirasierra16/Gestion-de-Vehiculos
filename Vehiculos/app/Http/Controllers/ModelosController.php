<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    
    public function Modelos(){
        return $modelos = Modelo::all();
    }

    public function Vehiculos(){
        return $vehiculos = Vehiculo::all();
    }

}
