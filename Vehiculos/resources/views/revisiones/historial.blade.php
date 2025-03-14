@extends('layout')

@section('content')
<div class="card shadow p-4">
    <h2>Historial de Revisiones - {{ $vehiculo->matricula }} ({{ $vehiculo->modelo->nombre }})</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Kilómetros Añadidos</th>
                <th>Kilómetros Totales</th>
            </tr>
        </thead>
        <tbody>
            @php
                $km_totales = $vehiculo->km; // Kilómetros iniciales del vehículo
            @endphp
            @foreach ($revisiones as $revision)
                @php
                    $km_totales += $revision->km_revision; // Sumamos los kilómetros de la revisión actual
                @endphp
                <tr>
                    <td>{{ $revision->fecha }}</td>
                    <td>{{ number_format($revision->km_revision, 0, ',', '.') }} KM</td>
                    <td>{{ number_format($km_totales, 0, ',', '.') }} KM</td> <!-- Mostrar los kilómetros totales -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('vehiculos.show', $vehiculo) }}" class="btn btn-success mt-3">Crear Nueva Revisión</a>
    <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

