<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\racks;
use App\books;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function index() {
        return view('User/login');
    }

    function home() {
        $user_info = Auth::user()->toArray();
        if ($user_info['type'] == 1) {
            return redirect('/user/client_home');
        } elseif ($user_info['type'] == 2) {
            return redirect('/user/admin_home');
        }
    }

    function client_home() {
        $rack = new racks();
        $racks = $rack->all_info();
        return view('User/client_home')
                        ->withRacks($racks);
    }
    
    function admin_home() {
        $rack = new racks();
        $racks = $rack->all_info();
        return view('User/admin_home')
                        ->withRacks($racks);
    }
}
