<?php

namespace App\Http\Controllers\f_doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('f_doctor.dashboard');
    }
}
