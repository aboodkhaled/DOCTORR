<?php

namespace App\Http\Controllers\hosbital;

use App\Http\Controllers\Controller;
use App\Http\Requests\hAdminRequest;
use App\model\admin;
use App\model\hosbital;
use App\model\role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use  App\model\cuontry;
use  App\model\city;
use App\Image;
use App\model\hosbital\hcuontry;
use App\model\hosbital\hcity;
use App\model\hosbital\happoemint;
use App\model\hosbital\hblood;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hlabe_price;
use App\model\hosbital\hlabe;
use App\model\hosbital\hx_price;
use App\model\hosbital\hxray;
use App\model\hosbital\hmate;
use App\model\hosbital\hoperation;
use App\model\hosbital\hphar_price;
use App\model\hosbital\hpharmice;
use App\model\hosbital\hserve;

class UsersController extends Controller {

    /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
         $users = hosbital::latest()->where('id', '=', auth()->id())->get(); //use pagination here
        return view('hosbital.users.index', compact('users'));
    }

    public function create(){
        $roles = Role::get();
        $cuontrys = cuontry::get();
        $citys = city::get();
        return view('hosbital.users.create',compact('roles','cuontrys','citys'));
    }


    public function store(hAdminRequest $request) {
        if($request->has('photo')){
            $filepath = uploadImage('hosbital', $request->photo);}
            $hosbitals = new hosbital();
            $hosbitals->name =  $request->name;
            $hosbitals->email = $request->email;
            $hosbitals->photo = $filepath;
            $hosbitals->password = bcrypt($request->password);  
            $hosbitals->mobile = $request->mobile;
            $hosbitals->active = 1;
            $hosbitals->sup_date = $request->sup_date;
            $hosbitals->sup_price = 0;
            $hosbitals->suppay_price = 0;
            $hosbitals->pay_time = 0;
            $hosbitals->pay_date = $request->sup_date;
            $hosbitals->status = 0;
            $hosbitals->cuontry_id =$request->cuontry_id;
            $hosbitals->city_id =$request->city_id;
            $hosbitals->address = $request->address;
            $hosbitals->des ="l";
            $hosbitals->role_id =$request->role_id;
        // save the new user data
        if($hosbitals->save())
             return redirect()->route('hosbital.users.index')->with(['success' => trans('messages.success')]);
        else
            return redirect()->route('hosbital.users.index')->with(['success' => 'حدث خطا ما']);

    }

    public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }
}
