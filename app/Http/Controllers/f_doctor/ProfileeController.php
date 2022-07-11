<?php

namespace App\Http\Controllers\f_doctor;

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

use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital;
use App\model\fhosbital\fcity;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
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
        $hdoctors = fdoctor::find(auth('f_doctor')->user()->id);  
        $hosbital = fhosbital::get();
        $hdepartments = fdepartment::active()->get();
        $hspecialtys = fspecialty::active()->get();
        $hcuontrys = fcuontry::get();
        $hcitys = fcity::get();

       //return $hosbital;

        return view('f_doctor.profile.edit', compact('hdoctors','hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));

    }

    public function updateProfile(hDProfileRequest $request)
    {
        //validate
        // db

       

            $hdoctor = fdoctor::find(auth('f_doctor')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('hdoctor', $request->photo);
                fdoctor::where('id', $hdoctor->id)
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
                $hdoctor->fcuontry_id =$request->fcuontry_id,
                $hdoctor->fcity_id =$request->fcity_id,
                $hdoctor->address = $request->address,
                $hdoctor->fspecialty_id =$request->fspecialty_id,
                $hdoctor->fdepartment_id =$request->fdepartment_id,
            ]);

         

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

       

    }

    public function getcity(Request $request ){
          
        $hcities = fcity::whereFcuontryId($request->fcuontry_id)->pluck('name','id');
        return response()->json($hcities);
    }


}
