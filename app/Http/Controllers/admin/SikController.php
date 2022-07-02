<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\sik;
use App\model\blood;
use App\model\cuontry;
use App\model\city;
use App\model\appoemint;
use App\User;
use App\Http\Requests\SikRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;
use Hash;
use Auth;

class SikController extends Controller
{
    public function index(){
        $siks =User::latest()->where('id', '<>', auth()->id())->get();
        
        return view('admin.sik.index', compact('siks'));
    }
    public function create(){
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        $bloods = blood::get();
        return view('admin.sik.create', compact('cuontrys','citys','bloods'));
    }
    public function save(SikRequest $request){
        $filepath = "";
        if($request->has('photo')){
            $filepath = uploadImage('user', $request->photo);}
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);  
            $user-> sex = $request->sex;
            $user-> sik_typ = $request->sik_typ;
            $user-> socia = $request->socia;
            $user->age = $request->age;
            $user->blood_id = $request->blood_id;
            $user->photo=$filepath;
            $user->cuontry_id = $request->cuontry_id;
            $user->city_id = $request->city_id;
            $user->address=$request->address;
            $user->save();

               
        return redirect()->route('admin.siks')->with(['success'=>'تم ألحفظ  بنجاح']);
    
    }

    public function edit($id){
        
        $sik = User::find($id);
        
        if(!$sik){
        return redirect()->route('admin.siks')->with(['error'=>'هذا ألمريض غير موجود']);}
        $bloods = blood::active()->get();
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        return view('admin.sik.edit',compact('sik','cuontrys','citys','bloods'));
       

    }

    public function update($sik_id, SikRequest $request){
        
        $sik = User::find($sik_id);
       
        if(!$sik)
        return redirect()->route('admin.siks')->with(['error'=>'هذا ألمريض غير موجود']);
        DB::beginTransaction();
        if($request->has('photo')){
            $filepath = uploadImage('user', $request->photo);
            User::where('id', $sik_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        $sik -> update([
            $sik->name = $request->name,
            $sik->email = $request->email,
            $sik->mobile = $request->mobile,
            $sik->password = bcrypt($request->password),
            $sik-> sex = $request->sex,
            $sik-> sik_typ = $request->sik_typ,
            $sik-> socia = $request->socia,
            $sik->age = $request->age,
            $sik->blood_id = $request->blood_id,
            
            $sik->cuontry_id = $request->cuontry_id,
            $sik->city_id = $request->city_id,
            $sik->address=$request->address, 
        ]);
        
       
        
        
        

        DB::commit();

        return redirect()->route('admin.siks')->with(['success'=>'تم ألتعديل  بنجاح']);
   
    }

    public function destroy($id){
        try{
            $sik = User::find($id);
            if(!$sik){
                return redirect() -> route('admin.siks',$id)-> with(['error'=>'هذة ألمريض غير موجودة']);
            }
            $sik -> delete();
            return redirect()->route('admin.siks')->with(['success'=>'تم حذف ألمريض بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('admin.siks')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function showdetail($id){
            $user = User::where('id',$id)->first();
           
            $appoemint = appoemint::where('user_id',$id)->get();
            return view('admin.sik.detail',compact('user','appoemint'));
        }
}
