<?php

namespace App\Http\Controllers\fhosbital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('fhosbital.dashboard');
    }
}
