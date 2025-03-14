@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2 class="mb-4">Lista de Vehículos</h2>

    <!-- Botón para agregar vehículo -->
    <a href="{{ route('vehiculos.create') }}" class="btn btn-success mb-3">Añadir Vehículo</a>

    <!-- Formulario de búsqueda por matrícula -->
    <form method="GET" class="mb-3 d-flex" action={{route('buscar_vehiculo')}}>
        <input type="text" name="matricula" class="form-control me-2" placeholder="Buscar por matrícula..." value="{{ request('matricula') }}">
        <button type="submit" class="btn btn-primary me-2">🔍 Buscar</button>
        
        @if(request('matricula'))
            <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">❌ Limpiar Búsqueda</a>
        @endif
    </form>

    <!-- Tabla de vehículos -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Modelo</th>
                <th>Kilómetros</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->matricula }}</td>
                    <td>{{ $vehiculo->modelo->nombre }}</td>
                    <td>{{ number_format($vehiculo->km, 0, ',', '.')}} KM</td>
                    <td>
                        <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-warning">Pasar Revisión</a>
                        <a href="{{ route('revisiones.historial', $vehiculo) }}" class="btn btn-info">Historial</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
