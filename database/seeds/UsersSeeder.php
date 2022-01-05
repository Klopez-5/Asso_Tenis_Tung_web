<?php

use App\User as User;
use Illuminate\Database\Seeder;
use Carbon\Carbon as CarbonCarbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date_create('1997-07-29');
        User::create([
            'card_id'=>'1728394586',
            'name'=>'Administrador',
            'last_name'=>'1',
            'email'=>'admin@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983857684',
            'date_of_birth'=>$date,
            'age'=>CarbonCarbon::parse($date)->age,
            'address'=>'Quito y allegados',
        ]);

        $date2 = date_create('2010-07-29');
        User::create([
            'card_id'=>'1111111111',
            'name'=>'Usuario',
            'last_name'=>'X',
            'email'=>'u1@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983857611',
            'date_of_birth'=>$date2,
            'age'=>CarbonCarbon::parse($date2)->age,
            'address'=>'Quito y Cuenca',
            'club_id'=>1,
        ]);

        $date3 = date_create('2004-12-30');
        User::create([
            'card_id'=>'1822222222',
            'name'=>'Usuario',
            'last_name'=>'Y',
            'email'=>'u2@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983857222',
            'date_of_birth'=>$date3,
            'age'=>CarbonCarbon::parse($date3)->age,
            'address'=>'Guayas y Manabi',
            'club_id'=>2,
        ]);

        $date4 = date_create('1999-08-21');
        User::create([
            'card_id'=>'1833333333',
            'name'=>'Usuario',
            'last_name'=>'Z',
            'email'=>'u3@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983857633',
            'date_of_birth'=>$date4,
            'age'=>CarbonCarbon::parse($date4)->age,
            'address'=>'Roldos y Bucaran',
            'club_id'=>1,
        ]);

        $date5 = date_create('1982-08-21');
        User::create([
            'card_id'=>'1833333333',
            'name'=>'Representante',
            'last_name'=>'de X',
            'email'=>'re1@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983857655',
            'date_of_birth'=>$date5,
            'age'=>CarbonCarbon::parse($date5)->age,
            'address'=>'Quininde y Bucaran',
            'relation_id'=>2,
            'represented_id'=>2,
        ]);

        $date6 = date_create('1974-08-21');
        User::create([
            'card_id'=>'1833333333',
            'name'=>'Representante',
            'last_name'=>'de Y',
            'email'=>'re2@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983811111',
            'date_of_birth'=>$date6,
            'age'=>CarbonCarbon::parse($date6)->age,
            'address'=>'Roldos y Juanquin de olmedo',
            'relation_id'=>5,
            'represented_id'=>3,
        ]);

        $date7 = date_create('1990-08-21');
        User::create([
            'card_id'=>'1833333333',
            'name'=>'Entrenador',
            'last_name'=>'Bernuli',
            'email'=>'entre@tennis.com',
            'password'=>bcrypt('123456'),
            'phone'=>'0983844444',
            'date_of_birth'=>$date7,
            'age'=>CarbonCarbon::parse($date7)->age,
            'address'=>'Quininde y Alquimides',
            'club_id'=>1,
        ]);

        $date8 = date_create('1990-08-21');
        factory(User::class,3)->create([

            'password'=>bcrypt('123456'),
            'date_of_birth'=>$date8,
            'age'=>CarbonCarbon::parse($date8)->age,
            'club_id'=>1,
        ]);
    }
}



