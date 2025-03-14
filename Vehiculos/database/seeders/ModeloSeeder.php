<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modelo;

class ModeloSeeder extends Seeder
{
    public function run()
    {
        $modelos = [
            'Toyota Corolla',
            'Honda Civic',
            'Ford Focus',
            'Chevrolet Cruze',
            'Volkswagen Golf',
            'Mazda 3',
            'Hyundai Elantra',
            'Nissan Sentra',
            'BMW Serie 3',
            'Mercedes-Benz Clase C'
        ];

        foreach ($modelos as $modelo) {
            Modelo::create(['nombre' => $modelo]);
        }
    }
}
