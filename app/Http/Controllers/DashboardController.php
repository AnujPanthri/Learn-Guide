<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use

class DashboardController extends Controller
{
    public function home(){
        return view('dashboard.home');
    }
}
