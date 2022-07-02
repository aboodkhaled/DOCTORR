<?php

namespace App\Http\Controllers\Site;

use App\Model\department;
use App\Http\Controllers\Controller;
use App\Model\hosbital\hdoctor;
use App\Model\hosbital\hdepartment;
use App\Model\clinic;
use App\Model\clinic\serve1;
use App\Model\clinic\serve2;
use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;

class CliniccController extends Controller
{
    public function clinicpyid($id)
    {
        $data = [];
        $data['clinic'] = clinic::where('id',$id) -> first(); 
        $data['serve1'] = serve1::orderBy('id')->get();
        $data['serve2'] = serve2::orderBy('id')->get();
        if ($data['clinic'])
            $data['serve1'] = $data['clinic']->serve1;
            $data['serve2'] = $data['clinic']->serve2;
//return $data;
        return view('front.clinic', $data);
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
