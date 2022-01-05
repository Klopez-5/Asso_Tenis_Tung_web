<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Categoria 10',
            'age_min' => 3,
            'age_max' => 10,
        ]);

        Category::create([
            'title' => 'Categoria 12',
            'age_min' => 11,
            'age_max' => 12,
        ]);

        Category::create([
            'title' => 'Categoria 14',
            'age_min' => 13,
            'age_max' => 14,
        ]);

        Category::create([
            'title' => 'Categoria 16',
            'age_min' => 15,
            'age_max' => 16,
        ]);

        Category::create([
            'title' => 'Categoria 18',
            'age_min' => 17,
            'age_max' => 100,
        ]);
    }
}
