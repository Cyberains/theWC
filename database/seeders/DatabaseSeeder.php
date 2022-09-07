<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([

            'name' => 'admin',
            'role' => 'admin',
            'mobile' => 9149173290,
            'mobile_status' => 1,
            'email' => 'admin@gmail.com',
            'email_status' => 1,
            'password' => bcrypt('admin')

        ]);

        DB::table('users')->insert([

            'name' => 'sonu',
            'role' => 'user',
            'mobile' => 7270808132,
            'mobile_status' => 1,
            'email' => 'sonu1.epic@gmail.com',
            'email_status' => 1,
            'password' => bcrypt('sonu')
        ]);

        DB::table('users')->insert([

            'name' => 'manoj',
            'role' => 'user',
            'mobile' => 7210821290,
            'mobile_status' => 0,
            'email' => 'manoj.epic1@gmail.com',
            'email_status' => 0,
            'password' => bcrypt('manoj')
        ]);

        DB::table('users')->insert([
            'name' => 'guest',
            'role' => 'user',
            'mobile' => 0000000000,
            'mobile_status' => 1,
            'email' => 'guest@gmail.com',
            'email_status' => 1,
            'password' => bcrypt('guest')
        ]);
    }
}
