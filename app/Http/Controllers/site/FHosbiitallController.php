<?php

namespace App\Http\Controllers\Site;

use App\Model\department;
use App\Http\Controllers\Controller;
use App\Model\fhosbital\fdoctor;
use App\Model\fhosbital\fdepartment;
use App\Model\fhosbital;
use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;

class FHosbiitallController extends Controller
{
    public function hosbitalpyid($id)
    {
        $data = [];
        $data['fhosbital'] = fhosbital::where('id',$id) -> first(); 
        $data['fdepartments'] = fdepartment::orderBy('id')->get();
        if ($data['fhosbital'])
            $data['fdoctor'] = $data['fhosbital']->fdoctor;
            $data['fdepartment'] = $data['fhosbital']->fdepartment;
//return $data;
        return view('front.fhosbitall', $data);
    }

    public function doctorbyid($id)
    {
        $data=[];
        $data['User'] = User::find(auth()->user()->id);
        $data['fdoctor'] = fdoctor::where('id',$id) -> first();  //improve select only required fields
        if (!$data['fdoctor']){ ///  redirect to previous page with message
              }

        $fdoctor_id = $data['fdoctor'] -> id ;
        $fdoctor_department_ids =  $data['fdoctor'] -> fdepartment ->pluck('id'); // [1,26,7] get all categories that product on it

      

         $data['fdoctord'] = fdoctor::whereHas('fdepartment',function ($cat) use($fdoctor_department_ids){
           $cat-> whereIn('fdepartment_id',$fdoctor_department_ids);
       }) -> get();
      // return $data;
        return view('front.fdoctor-details', $data);
    }

}
