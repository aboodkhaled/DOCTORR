<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Model\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile()
    {

        $admin = Admin::find(auth('admin')->user()->id);

        return view('admin.profile.edit', compact('admin'));

    }

    public function updateProfile(ProfileRequest $request)
    {
        //validate
        // db

        try {

            $admin = Admin::find(auth('admin')->user()->id);


            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }
            if($request->has('photo')){
                $filepath = uploadImage('admin', $request->photo);
                admin::where('id', $admin->id)
                ->update([
                'photo' => $filepath,
                ]);
            }
            unset($request['id']);
          
            unset($request['password_confirmation']);
            $admin-> update([
                $admin->photo = $filepath,
                $admin->password =$request-> password,
            ]);
           

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);

        }

    }


}
