<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'title' => 'Azuay',
        ]);

        Province::create([
            'title' => 'Bolívar',
        ]);

        Province::create([
            'title' => 'Cañar',
        ]);

        Province::create([
            'title' => 'Carchi',
        ]);

        Province::create([
            'title' => 'Chimborazo',
        ]);

        Province::create([
            'title' => 'Cotopaxi',
        ]);

        Province::create([
            'title' => 'El Oro',
        ]);

        Province::create([
            'title' => 'Esmeraldas',
        ]);

        Province::create([
            'title' => 'Galápagos',
        ]);

        Province::create([
            'title' => 'Guayas',
        ]);

        Province::create([
            'title' => 'Imbabura',
        ]);

        Province::create([
            'title' => 'Loja',
        ]);

        Province::create([
            'title' => 'Los Ríos',
        ]);

        Province::create([
            'title' => 'Manabí',
        ]);

        Province::create([
            'title' => 'Morona Santiago',
        ]);

        Province::create([
            'title' => 'Napo',
        ]);

        Province::create([
            'title' => 'Orellana',
        ]);

        Province::create([
            'title' => 'Pastaza',
        ]);

        Province::create([
            'title' => 'Pichincha',
        ]);


        Province::create([
            'title' => 'Santa Elena',
        ]);

        Province::create([
            'title' => 'Santo Domingo de los Tsáchilas',
        ]);

        Province::create([
            'title' => 'Sucumbíos',
        ]);

        Province::create([
            'title' => 'Tungurahua',
        ]);

        Province::create([
            'title' => 'Zamora Chinchipe',
        ]);
    }
}
