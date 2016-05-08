<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\racks;
use App\books;
use Illuminate\Support\Facades\Session;

class BookController extends Controller {

    function get_rack_books() {
        $book = new books;
        $get_rack_books = $book->get_rack_books();
        return json_encode($get_rack_books);
    }

    function search_books() {
        $book = new books;
        $search_books = $book->search_books();
        return json_encode($search_books);
    }

    function create() {
        $book = new books;
        $is_book_found = $book->get_book_in_same_rack();
        if ($is_book_found) {
            Session::put('msg', 'Selected Rack has already this book.');
            return redirect('/user/admin_home');
        } else {
            $rack_limit = $book->get_rack_books();
            if (count($rack_limit) < 10) {
                $is_book_added = $book->book_add();
                if ($is_book_added) {
                    return redirect('/user/admin_home');
                }
            } else {
                Session::put('msg', 'Rack is full, insert book into another rack');
                return redirect('/user/admin_home');
            }
        }
    }

    function edit($book_id) {
        $book = new books;
        $books = $book->get_book_by_id($book_id);
        return view('Book/book_edit')
                        ->withBook($books);
    }
    
    public function update($book_id, Request $request) {
        $book = new books;
        $is_book_update = $book->update_book($book_id);

        if ($is_book_update) {
            return redirect('/user/admin_home');
        }
    }

    public function show($id) {
        
    }

    function destroy($book_id = 0) {
        $book = new books;
        $book_del = $book::find($book_id);
        $book_del->delete();
        return redirect('/user/admin_home');
    }

}
