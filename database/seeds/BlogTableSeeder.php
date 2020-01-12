<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Blog;

class BlogTableSeeder extends Seeder
{

    public function run()
    {
        // data faker indonesia
        $faker = Faker::create('id_ID'); // id yang diberikan berasal dari indonesia

        // membuat data dummy sebanyak 50 record
        for($x = 1; $x <= 20; $x++){

            // insert data dummy artcle dengan faker
            Blog::insert([
                'title' => $faker->sentence,
                'body' => $faker->text,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
        
    }
}
