<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RolSeeder::class);

        $this->call(ClubsSeeder::class);

        $this->call(RelationsSeeder::class);

        $this->call(LevelsSeeder::class);

        $this->call(CategoriesSeeder::class);

        $this->call(UsersSeeder::class);

        $this->call(PermissionSeeder::class);

        $this->call(ProvinceSeeder::class);

    }
}
