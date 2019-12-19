<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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
