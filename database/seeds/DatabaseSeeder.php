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
	    //$this->call(UsersTableSeeder::class);
	    for($i = 0; $i < 20 ; $i++) {
		    DB::table('users')->insert([
			    'name' => Str::random(10),
			    'email' => 'admin_job_'.rand(0, 100).'@job.com',
			    'password' => bcrypt('123456'),
			    'phone' => '0989878776',
			    'level' => 1
		    ]);
	    }
    }
}
