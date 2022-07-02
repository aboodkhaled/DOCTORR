<?php

namespace App\Http\Controllers\h_doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
         return view('h_doctor.dashboard');
    }
}
