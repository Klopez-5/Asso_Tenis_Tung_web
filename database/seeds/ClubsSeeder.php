<?php

use Illuminate\Database\Seeder;
use App\Club;

class ClubsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Club::create([
            'name' => 'Club Nacional de Ambato',
        ]);

        Club::create([
            'name' => 'Asociacion de Tennis de Tungurahua',
        ]);

        Club::create([
            'name'=>'Club de Tennis',
        ]);

    }
}
