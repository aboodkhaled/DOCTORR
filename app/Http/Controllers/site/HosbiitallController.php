<?php

namespace App\Http\Controllers\Site;

use App\Model\department;
use App\Http\Controllers\Controller;
use App\Model\hosbital\hdoctor;
use App\Model\hosbital\hdepartment;
use App\Model\hosbital;
use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;

class HosbiitallController extends Controller
{
    public function hosbitalpyid($id)
    {
        $data = [];
        $data['hosbital'] = hosbital::where('id',$id) -> first(); 
        $data['hdepartments'] = hdepartment::orderBy('id')->get();
        if ($data['hosbital'])
            $data['hdoctor'] = $data['hosbital']->hdoctor;
            $data['hdepartment'] = $data['hosbital']->hdepartment;
//return $data;
        return view('front.hosbitall', $data);
    }

    public function doctorbyid($id)
    {
        $data=[];
        $data['User'] = User::find(auth()->user()->id);
        $data['hdoctor'] = hdoctor::where('id',$id) -> first();  //improve select only required fields
        if (!$data['hdoctor']){ ///  redirect to previous page with message
              }

        $doctor_id = $data['hdoctor'] -> id ;
        $doctor_department_ids =  $data['hdoctor'] -> hdepartment ->pluck('id'); // [1,26,7] get all categories that product on it

      

         $data['hdoctord'] = hdoctor::whereHas('hdepartment',function ($cat) use($doctor_department_ids){
           $cat-> whereIn('hdepartment_id',$doctor_department_ids);
       }) -> get();
      // return $data;
        return view('front.hdoctor-details', $data);
    }

}
