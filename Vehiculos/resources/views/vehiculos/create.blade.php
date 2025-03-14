@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2>Registrar Vehículo</h2>
    
    @isset($error)
        <p style={{"color:red"}}>Error de validacion</p>
    @endisset

    <form method="POST" action="{{ route('vehiculos.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Matrícula:</label>
            <input type="text" name="matricula" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Modelo:</label>
            <select name="modelo_id" class="form-select">
                @foreach($modelos as $modelo)
                    <option value="{{ $modelo->id }}">{{ $modelo->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Kilómetros:</label>
            <input type="number" name="km" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar Vehículo</button>
    </form>
</div>
@endsection
