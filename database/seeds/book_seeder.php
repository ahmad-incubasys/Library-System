<?php

use Illuminate\Database\Seeder;

class book_seeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('books')->insert([
            'title' => 'English book 1',
            'author' => 'English author 1',
            'published_year' => '2006',
            'rack_id' => '1',
                ]
        );



        DB::table('books')->insert([
            'title' => 'English book 2',
            'author' => 'English author 2',
            'published_year' => '2006',
            'rack_id' => '1',
                ]
        );

        DB::table('books')->insert([
            'title' => 'English book 3',
            'author' => 'English author 3',
            'published_year' => '2006',
            'rack_id' => '1',
                ]
        );

        DB::table('books')->insert([
            'title' => 'Arabic book 1',
            'author' => 'Arabic author 1',
            'published_year' => '2004',
            'rack_id' => '2',
                ]
        );

        DB::table('books')->insert([
            'title' => 'Arabic book 2',
            'author' => 'Arabic author 2',
            'published_year' => '2006',
            'rack_id' => '2',
                ]
        );

        DB::table('books')->insert([
            'title' => 'Arabic book 3',
            'author' => 'Arabic author 3',
            'published_year' => '2004',
            'rack_id' => '2',
                ]
        );

        DB::table('books')->insert([
            'title' => 'French book 1',
            'author' => 'French author 1',
            'published_year' => '2009',
            'rack_id' => '3',
                ]
        );

        DB::table('books')->insert([
            'title' => 'Urdu book 1',
            'author' => 'Urdu author 1',
            'published_year' => '2009',
            'rack_id' => '4',
                ]
        );

        DB::table('books')->insert([
            'title' => 'Urdu book 2',
            'author' => 'Urdu author 2',
            'published_year' => '2009',
            'rack_id' => '4',
                ]
        );


        DB::table('books')->insert([
            'title' => 'Urdu book 3',
            'author' => 'Urdu author 3',
            'published_year' => '2011',
            'rack_id' => '4',
                ]
        );
    }

}
