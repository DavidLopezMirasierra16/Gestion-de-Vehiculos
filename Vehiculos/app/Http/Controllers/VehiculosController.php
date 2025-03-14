<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculo = new ModelosController();
        $vehiculos = $vehiculo->Vehiculos();

        return view('vehiculos/index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelo = new ModelosController();
        $modelos = $modelo->Modelos();

        return view('vehiculos/create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricula'=>'required|unique:vehiculos|max:7',
            'km'=>'required|numeric|min:0'
        ]);

        if($validator->fails()){
            $error = 1;
            $modelo = new ModelosController();
            $modelos = $modelo->Modelos();

            return view('vehiculos/create', compact('error', 'modelos'));
        }

        $vehiculo = new Vehiculo();
        $vehiculo->matricula=$request->matricula;
        $vehiculo->modelo_id=$request->modelo_id;
        $vehiculo->km=$request->km;
        $vehiculo->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $coche = $request->query('matricula');

        $vehiculos = Vehiculo::where('matricula', 'like', '%'.$coche.'%')->get();

        if($vehiculos->isEmpty()){
            return view('vehiculos/index', compact('vehiculos'));
        }

        return view('vehiculos/index', compact('vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
