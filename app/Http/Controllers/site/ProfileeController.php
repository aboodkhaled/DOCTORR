<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SikRequest;
use App\User;
use App\model\blood;
use App\model\cuontry;
use App\model\city;
use Illuminate\Http\Request;

class ProfileeController extends Controller
{
    public function editProfile()
    {

        $user = User::find(auth()->user()->id);
        $bloods = blood::active()->get();
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        return view('front.profile', compact('user','bloods','cuontrys','citys'));

    }

    public function updateProfile(SikRequest $request)
    {
        //validate
        // db

        try {

            $user = User::find(auth()->user()->id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('user', $request->photo);
                User::where('id', $user->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $user-> update([
            $user->name = $request->name,
            $user->email = $request->email,
            $user->mobile = $request->mobile,
            $user->password =$request-> password,
            $user-> sex = $request->sex,
            $user-> sik_typ = $request->sik_typ,
            $user-> socia = $request->socia,
            $user->age = $request->age,
            $user->blood_id = $request->blood_id,
           
            $user->cuontry_id = $request->cuontry_id,
            $user->city_id = $request->city_id,
            $user->address=$request->address, 
            ]);
           
            toastr()->success(trans('messages.success'));
            return redirect()->back()->with(['success' => trans('messages.success')]);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }


}
