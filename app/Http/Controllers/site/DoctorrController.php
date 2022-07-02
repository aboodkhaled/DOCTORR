<?php

namespace App\Http\Controllers\Site;

use App\Model\department;
use App\Http\Controllers\Controller;
use App\Model\doctor;
use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;
class DoctorrController extends Controller
{
    public function doctorbyid($id)
    {
        $data=[];
        $data['User'] = User::all('id');
        $data['doctor'] = doctor::where('id',$id) -> first();  //improve select only required fields
        if (!$data['doctor']){ ///  redirect to previous page with message
              }

        $doctor_id = $data['doctor'] -> id ;
        $doctor_department_ids =  $data['doctor'] -> department ->pluck('id'); // [1,26,7] get all categories that product on it

      

         $data['doctord'] = doctor::whereHas('department',function ($cat) use($doctor_department_ids){
           $cat-> whereIn('department_id',$doctor_department_ids);
       }) -> get();
       
        return view('front.doctor-details', $data);
    }
}
