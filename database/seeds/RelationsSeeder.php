<?php

use Illuminate\Database\Seeder;
use App\Relation;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relation::create([
            'title'=>'Padre',
        ]);

        Relation::create([
            'title'=>'Madre',
        ]);

        Relation::create([
            'title'=>'Tio',
        ]);

        Relation::create([
            'title'=>'Tia',
        ]);

        Relation::create([
            'title'=>'Abuelo',
        ]);

        Relation::create([
            'title'=>'Abuela',
        ]);

        Relation::create([
            'title'=>'Hermano',
        ]);

        Relation::create([
            'title'=>'Hermana',
        ]);

        Relation::create([
            'title'=>'Primo',
        ]);

        Relation::create([
            'title'=>'Prima',
        ]);

        Relation::create([
            'title'=>'Representante legal',
        ]);
    }
}
