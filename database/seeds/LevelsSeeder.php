<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'title' => 'Primera Categoria',
        ]);

        Level::create([
            'title' => 'Segunda Categoria',
        ]);

        Level::create([
            'title' => 'Tercera Categoria',
        ]);

        Level::create([
            'title' => 'Cuarta Categoria',
        ]);
        Level::create([
            'title' => 'Quinta Categoria',
        ]);
    }
}
