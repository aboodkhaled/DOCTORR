<?php

namespace App\Http\Controllers\h_doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\hDProfileRequest;
use App\model\doctor;
use App\model\cuontry;
use App\model\city;
use App\model\department;
use App\model\specialty;
use Illuminate\Http\Request;
use App\Events\appoiment;

use Illuminate\Support\Facades\config;

use App\model\hosbital\hdoctor;
use App\model\hosbital\hcuontry;
use App\model\hosbital;
use App\model\hosbital\hcity;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\Http\Requests\HdoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;

use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;

class ProfileeController extends Controller
{
    public function eeditProfile()
    {
        $hdoctors = hdoctor::find(auth('h_doctor')->user()->id);  
        $hosbital = hosbital::get();
        $hdepartments = hdepartment::active()->get();
        $hspecialtys = hspecialty::active()->get();
        $hcuontrys = hcuontry::get();
        $hcitys = hcity::get();

       //return $hosbital;

        return view('h_doctor.profile.edit', compact('hdoctors','hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));

    }

    public function updateProfile(hDProfileRequest $request)
    {
        //validate
        // db

       

            $hdoctor = hdoctor::find(auth('h_doctor')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('hdoctor', $request->photo);
                hdoctor::where('id', $hdoctor->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $hdoctor-> update([
                $hdoctor->doc_name =  $request->doc_name,
                $hdoctor->doc_degry =  $request->doc_degry,
                $hdoctor->sex = $request->sex,
                $hdoctor->doc_des = $request->doc_des,
                $hdoctor->email = $request->email,
                $hdoctor->password = $request->password,
                $hdoctor->mobile = $request->mobile, 
                $hdoctor->perth_date = $request->perth_date,
                $hdoctor->hcuontry_id =$request->hcuontry_id,
                $hdoctor->hcity_id =$request->hcity_id,
                $hdoctor->address = $request->address,
                $hdoctor->hspecialty_id =$request->hspecialty_id,
                $hdoctor->hdepartment_id =$request->hdepartment_id,
            ]);

         

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

       

    }

    public function getcity(Request $request ){
          
        $hcities = hcity::whereHcuontryId($request->hcuontry_id)->pluck('name','id');
        return response()->json($hcities);
    }


}
