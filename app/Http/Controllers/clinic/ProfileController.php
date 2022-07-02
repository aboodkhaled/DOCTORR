<?php

namespace App\Http\Controllers\clinic;

use App\Http\Controllers\Controller;
use App\Http\Requests\CProfileRequest;
use App\Model\clinic;
use App\model\plase;
use App\model\city;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function eeditProfile()
    {

        $clinics = clinic::find(auth('clinic')->user()->id);
        
        $plases = plase::get();
        

        return view('clinic.profile.edit', compact('clinics','plases'));

    }

    public function updateProfile(CProfileRequest $request)
    {
        //validate
        // db

       

            $clinic = clinic::find(auth('clinic')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('clinic', $request->photo);
                clinic::where('id', $hosbital->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $clinic-> update([
            $clinic->name = ['en' => $request->name_en, 'ar' => $request->name],
            $clinic->email = $request->email,
           
            $clinic->password = $request->password,  
            $clinic->mobile = $request->mobile,
            $clinic->plase_id =$request->plase_id,
            
            $clinic->address =['en' => $request->address_en, 'ar' => $request->address],
            
            ]);

         

            return redirect()->route('clinic.dashboard')->with(['success' => 'تم التحديث بنجاح']);

       

    }

    public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }


}
