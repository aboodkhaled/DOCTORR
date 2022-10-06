<?php

namespace App\Http\Controllers\hadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhrofileRequest;
use App\model\hadmin;
use Illuminate\Http\Request;
use App\model\cuontry;

use App\model\city;

class ProfileController extends Controller
{
    public function editProfile()
    {

        $admin = hadmin::find(auth('hadmin')->user()->id);
        $cuontrys = cuontry::get();
        $citys = city::get(); 

        return view('hadmin.profile.edit', compact('admin','cuontrys','citys'));

    }

    public function updateProfile(PhrofileRequest $request)
    {
        //validate
        // db

        try {

            $admin = hadmin::find(auth('hadmin')->user()->id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('hadmin', $request->photo);
                hadmin::where('id', $admin->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $admin-> update([
                $admin->name =  $request->name,
                $admin->photo = $filepath,
                $admin->password =$request-> password,

                $admin->email = $request->email,
                
                $admin->mobile = $request->mobile, 
                $admin->cuontry_id =$request->cuontry_id,
                $admin->city_id =$request->city_id,
                $admin->address =$request->address,
            ]);
           

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }

    public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }


}
