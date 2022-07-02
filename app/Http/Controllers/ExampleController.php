<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class ExampleController extends Controller
{
    public function index(){
        return view('test');
      }

      public function setTarget(Request $request){
        Session::put('target',$request->target);
        return 1;
      }
}
