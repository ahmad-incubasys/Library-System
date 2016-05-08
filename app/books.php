<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class books extends Model {

    protected $table = 'books';

    public function get_rack_books() {
        $rack_id = Input::get('rack_id');
        $all_books = books::where("rack_id", "=", $rack_id)
                ->get();
        return $all_books;
    }

    public function search_books() {
        $search_by = Input::get('search_by');
        $query = DB::table('books')
                ->join('racks', 'books.rack_id', '=', 'racks.id')
                ->where('books.author', 'like', "%$search_by%")
                ->orwhere('books.title', 'like', "%$search_by%")
                ->orwhere('books.published_year', '=', $search_by)
                ->select(DB::raw('books.*, racks.*'));

        $result = $query->get();

        return $result;
    }

    public function get_book_in_same_rack() {
        $book_name = Input::get('book_name');
        $rack_id = Input::get('rack_id');


        $get_book = books::where("title", "=", $book_name)->where("rack_id", "=", $rack_id)->get();
        return $get_book->toArray();
    }

    public function book_add() {
        $book_name = Input::get('book_name');
        $rack_id = Input::get('rack_id');
        $author_name = Input::get('author_name');
        $year = Input::get('year');

        $book = new books;
        $book->title = $book_name;
        $book->author = $author_name;
        $book->published_year = $year;
        $book->rack_id = $rack_id;
        if ($book->save())
            return true;
        return false;
    }

    public function get_book_by_id($book_id) {
        $get_book = books::where("id", "=", $book_id)->get();
        return $get_book->toArray();
    }

    public function update_book($book_id) {
        $book_name = Input::get('book_name');
        if (books::where("id", "=", $book_id)->update(['title' => $book_name]))
            return TRUE;
        return FALSE;
    }

}
