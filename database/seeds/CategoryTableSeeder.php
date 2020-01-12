<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        Category::insert([
            'name' => 'HTML',
            'slug' => 'html',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        Category::insert([
            'name' => 'CSS',
            'slug' => 'css',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        Category::insert([
            'name' => 'PHP',
            'slug' => 'php',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

    }
}
