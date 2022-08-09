<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('dashboard.admins.index');
    }

    function profile(){
        return view('dashboard.admins.profile');
    }

    function settings(){
        return view('dashboard.admins.settings');
    }
}
