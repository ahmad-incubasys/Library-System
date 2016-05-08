<?php

use Illuminate\Database\Seeder;

class rack_seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('racks')->insert([
            'name' => 'English Rack',
        ]);

        DB::table('racks')->insert([
            'name' => 'Arabic Rack',
        ]);
        DB::table('racks')->insert([
            'name' => 'French Rack',
        ]);

        DB::table('racks')->insert([
            'name' => 'Urdu Rack'
        ]);
    }

}
