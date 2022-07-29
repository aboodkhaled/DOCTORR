<?php

namespace App\Http\Controllers\Site;

use App\model\department;
use App\Http\Controllers\Controller;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hdepartment;
use App\model\clinic;
use App\model\clinic\serve1;
use App\model\clinic\serve2;
use App\model\clinic\serve3;
use App\model\clinic\serve4;
use App\model\clinic\serve5;
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
        $data['serve3'] = serve3::orderBy('id')->get();
        $data['serve4'] = serve4::orderBy('id')->get();
        $data['serve5'] = serve5::orderBy('id')->get();
        if ($data['clinic'])
            $data['serve1'] = $data['clinic']->serve1;
            $data['serve2'] = $data['clinic']->serve2;
            $data['serve3'] = $data['clinic']->serve3;
            $data['serve4'] = $data['clinic']->serve4;
            $data['serve5'] = $data['clinic']->serve5;
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
