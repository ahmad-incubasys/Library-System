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
            'name' => 'English',
        ]);

        DB::table('racks')->insert([
            'name' => 'Arabic',
        ]);
        DB::table('racks')->insert([
            'name' => 'French',
        ]);

        DB::table('racks')->insert([
            'name' => 'Urdu'
        ]);
    }

}
