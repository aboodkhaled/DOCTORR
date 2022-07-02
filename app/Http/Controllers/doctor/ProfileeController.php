<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DProfileRequest;
use App\model\doctor;
use App\model\cuontry;
use App\model\city;
use App\model\department;
use App\model\specialty;
use Illuminate\Http\Request;

class ProfileeController extends Controller
{
    public function eeditProfile()
    {

        $doctors = doctor::find(auth('doctorr')->user()->id);
        $departments = department::active()->get();
        $specialtys = specialty::active()->get();  
        $cuontrys = cuontry::get();
        $citys = city::get(); 

        return view('doctor.profile.edit', compact('doctors','departments','specialtys','cuontrys','citys'));

    }

    public function updateProfile(DProfileRequest $request)
    {
        //validate
        // db

       

            $doctor = doctor::find(auth('doctorr')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('doctor', $request->photo);
                doctor::where('id', $doctor->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $doctor-> update([
                $doctor->photo = $filepath,
                $doctor->password =$request-> password,
                $doctor->email =$request-> email,
            ]);

         

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

       

    }

    public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }


}
