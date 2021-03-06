<?php
namespace App;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        Eloquent::unguard();
		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // $this->call(UsersTableSeeder::class);
        // $this->call(BlogTableSeeder::class);
        // $this->call(BlogsTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);

		// supposed to only apply to a single connection and reset it's self  but I like to explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
