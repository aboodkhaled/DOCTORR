<?php

namespace App\Http\Controllers\clinic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('clinic.dashboard');
    }
}
