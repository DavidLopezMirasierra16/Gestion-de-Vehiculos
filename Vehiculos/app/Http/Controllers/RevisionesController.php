<?php

namespace App\Http\Controllers;

use App\Models\Revisione;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $revisiones = Revisione::where('vehiculo_id', $id)->get(); //GET!!!!!!!!!!!
        $vehiculo = Vehiculo::find($id);

        if(!$revisiones){
            return redirect('/');
        }

        return view('revisiones.historial', compact('revisiones', 'vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        if (!$vehiculo) {
            return redirect('/');
        }

        return view('revisiones/create', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::find($id);

        $validator = Validator::make($request->all(), [
            'km_revision' => 'required|numeric|min:0'
        ]);

        if ($validator->fails()) {
            return redirect('/');
        }

        $revision = new Revisione();
        $revision->vehiculo_id = $vehiculo->id;
        $revision->fecha = date('d-F-o');
        $revision->km_revision = $request->km_revision;
        $revision->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
