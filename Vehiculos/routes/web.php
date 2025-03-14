<?php

use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Support\Facades\Route;

// CREA LAS RUTAS

//Ruta para la vista principal
Route::get('/', [VehiculosController::class, 'index'])->name('vehiculos.index');

//Ruta para el formulario de crear
Route::get('/formVehiculos', [VehiculosController::class, 'create'])->name('vehiculos.create');

//Ruta para crear un vehiculo
Route::post('/formVehiculos', [VehiculosController::class, 'store'])->name('vehiculos.store');

//Ruta que nos busca un vehiculo
Route::get('/vehiculo', [VehiculosController::class, 'show'])->name('buscar_vehiculo');

//--------------------------------------------------------------------------------------------------

//Ruta que nos lleva al formulario de añadir km
Route::get('/formKm/{vehiculo}', [RevisionesController::class, 'edit'])->name('vehiculos.show');

//Ruta que nos edita los km
Route::post('/formKm/{vehiculo}', [RevisionesController::class, 'update'])->name('revisiones.store');

//Ruta que nos muestra las revisiones
Route::get('/revisiones/{vehiculo}', [RevisionesController::class, 'show'])->name('revisiones.historial'); 