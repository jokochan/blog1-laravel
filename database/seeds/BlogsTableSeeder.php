<?php

use Illuminate\Database\Seeder;
// use App\Blog;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Blog::class, 100)->create()->each(function($blog){   // isi database 100 rows
            $blog->save();
        });
    }
}
