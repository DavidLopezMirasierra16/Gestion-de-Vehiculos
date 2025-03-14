@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2>Revisión del Vehículo</h2>
    <form method="POST" action="{{ route('revisiones.store', $vehiculo) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Matrícula:</label>
            <input type="text" class="form-control" value="{{ $vehiculo->matricula }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo:</label>
            <input type="text" class="form-control" value="{{ $vehiculo->modelo->nombre }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Kilómetros actuales:</label>
            <input type="text" class="form-control" value="{{ $vehiculo->km }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Kilómetros añadidos:</label>
            <input type="number" name="km_revision" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar Revisión</button>
    </form>
    <a href="{{ route('vehiculos.index', $vehiculo) }}" class="btn btn-secondary mt-3">⬅ Volver al Historial</a>
</div>
@endsection
