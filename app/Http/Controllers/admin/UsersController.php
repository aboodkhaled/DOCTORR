<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\model\admin;
use App\model\role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;

class UsersController extends Controller {

    /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
         $users = Admin::latest()->where('id', '<>', auth()->id())->get(); //use pagination here
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        $roles = Role::get();
        return view('admin.users.create',compact('roles'));
    }


    public function store(AdminRequest $request) {
        $filepath = "";
        if($request->has('photo')){
            $filepath = uploadImage('admin', $request->photo);
            
        }
        $user = new admin();
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->photo = $filepath;
        $user->password = bcrypt($request->password);   // the best place on model
        $user->role_id = $request->role_id;

        // save the new user data
        if($user->save())
             return redirect()->route('admin.users.index')->with(['success' => trans('messages.success')]);
        else
            return redirect()->route('admin.users.index')->with(['success' => 'حدث خطا ما']);

    }
}
