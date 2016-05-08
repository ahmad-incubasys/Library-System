<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class racks extends Model {

    protected $table = 'racks';

    public function all_info() {
        $query = DB::table('racks')
                ->leftjoin('books', 'books.rack_id', '=', 'racks.id')
                ->select(DB::raw('racks.* ,count(books.rack_id) as total_books'))
                ->groupBy('racks.name');

        $result = $query->get();
        return $result;
    }

    public function update_rack($rack_id) {
        $rack_name = Input::get('rack_name');
        if (racks::where("id", "=", $rack_id)->update(['name' => $rack_name]))
            return TRUE;
        return FALSE;
    }

    public function get_rack_by_id($rack_id) {
        $get_rack = racks::where("id", "=", $rack_id)->get();
        return $get_rack->toArray();
    }

    public function get_rack_by_name() {
        $rack_name = Input::get('rack_name');
        $get_rack = racks::where("name", "=", $rack_name)->get();
        return $get_rack->toArray();
    }

    public function rack_add() {
        $rack_name = Input::get('rack_name');
        $rack = new racks;
        $rack->name = $rack_name;
        if ($rack->save())
            return true;
        return false;
    }

    

}
