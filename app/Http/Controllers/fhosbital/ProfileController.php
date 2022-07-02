<?php

namespace App\Http\Controllers\hosbital;

use App\Http\Controllers\Controller;
use App\Http\Requests\HProfileRequest;
use App\Model\hosbital;
use App\model\cuontry;
use App\model\city;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function eeditProfile()
    {

        $hosbitals = hosbital::find(auth('hosbitall')->user()->id);
        
        $cuontrys = cuontry::get();
        $citys = city::get(); 

        return view('hosbital.profile.edit', compact('hosbitals','cuontrys','citys'));

    }

    public function updateProfile(HProfileRequest $request)
    {
        //validate
        // db

       

            $hosbital = hosbital::find(auth('hosbitall')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('hosbital', $request->photo);
                hosbital::where('id', $hosbital->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $hosbital-> update([
            $hosbital->name =  $request->name,
            $hosbital->email = $request->email,
           
            $hosbital->password = $request->password,  
            $hosbital->mobile = $request->mobile,
            $hosbital->cuontry_id =$request->cuontry_id,
            $hosbital->city_id =$request->city_id,
            $hosbital->address = $request->address,
            $hosbital->des = $request->des,
            ]);

         

            return redirect()->route('hosbital.dashboard')->with(['success' => 'تم التحديث بنجاح']);

       

    }

    public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }


}
