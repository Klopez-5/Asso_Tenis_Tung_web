<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('roles')->truncate();
        Role::create([
            'name'=>'Administrador',
            'slug'=>'admin',
            'full_access'=>'yes',
        ]);

        Role::create([
            'name'=>'Deportista',
            'slug'=>'deportista',
            'full_access'=>'no',
        ]);

        Role::create([
            'name'=>'Entrenador',
            'slug'=>'entrenador',
            'full_access'=>'no',
        ]);

        Role::create([
            'name'=>'Representante',
            'slug'=>'representante',
            'full_access'=>'no',
        ]);

        Role::create([
            'name'=>'Directivo',
            'slug'=>'directivo',
            'full_access'=>'no',
        ]);

    }
}
