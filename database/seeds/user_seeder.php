<?php

use Illuminate\Database\Seeder;

class user_seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {


        DB::table('users')->insert([
            'name' => 'ahmad',
            'email' => 'user_1@gmail.com',
            'password' => bcrypt('ahmad'),
            'type' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'faraz',
            'email' => 'user_2@gmail.com',
            'password' => bcrypt('ahmad'),
            'type' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'ahmad',
            'email' => 'admin_1@gmail.com',
            'password' => bcrypt('ahmad'),
            'type' => '2'
        ]);

        DB::table('users')->insert([
            'name' => 'faraz',
            'email' => 'admin_2@gmail.com',
            'password' => bcrypt('ahmad'),
            'type' => '2'
        ]);
    }

}
