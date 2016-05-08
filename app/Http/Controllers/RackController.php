<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\racks;
use App\books;
use Illuminate\Support\Facades\Session;

class RackController extends Controller {

    function edit($rack_id = 0) {
        $rack = new racks;
        $racks = $rack->get_rack_by_id($rack_id);
        return view('Rack/rack_edit')
                        ->withRack($racks);
    }

    public function update($rack_id, Request $request) {
        $rack = new racks;
        $is_rack_update = $rack->update_rack($rack_id);

        if ($is_rack_update) {
            return redirect('/user/admin_home');
        }
    }

    public function show($id) {
        
    }

    function destroy($rack_id = 0) {

        $rack = racks::find($rack_id);
        $rack->delete();
        return redirect('/user/admin_home');
    }

    function create() {
        $rack = new racks;
        $is_rack_found = $rack->get_rack_by_name();
        if ($is_rack_found) {
            return redirect('/user/admin_home');
        } else {
            $is_rack_added = $rack->rack_add();
            if ($is_rack_added) {
                return redirect('/user/admin_home');
            }
        }
    }

}
