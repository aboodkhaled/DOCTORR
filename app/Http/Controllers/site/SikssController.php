<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\sik;
use App\model\blood;
use App\model\cuontry;
use App\model\city;
use App\model\appoemint;
use App\model\doctor;
use App\User;
use App\Http\Requests\SikRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;
use Hash;
use Auth;
use App\model\department;
use App\model\labe;
use App\model\doctor_serve;
use App\model\serve;
use App\model\admin;
use App\model\specialty;
use App\model\user_axam;
use App\model\lab_price;
use App\model\user_xray;
use App\model\x_price;
use App\model\pharmice;
use App\model\user_medicen;
use App\model\phar_price;
use App\model\user_diagno;
use App\model\mate;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;


use App\model\hosbital\hcuontry;
use App\model\hosbital\hcity;
use App\model\hosbital\happoemint;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hlabe;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hserve;
use App\model\hosbital\hspecialty;
use App\model\hosbital\huser_axam;
use App\model\hosbital\huser_xray;
use App\model\hosbital\hlabe_price;
use App\model\hosbital\hxray;
use App\model\hosbital\hx_price;
use App\model\hosbital\hpharmice;
use App\model\hosbital\huser_medicen;
use App\model\hosbital\hphar_price;
use App\model\hosbital\huser_diagno;
use App\model\hosbital\hmate;
use App\model\hosbital;
class SikssController extends Controller
{
    
    public function index(){
     $departments = hdepartment::active()->get();
      $specialtys = hspecialty::active()->get();
      $hosbitals = hosbital::active()->get();
      $users = User::find(auth('')->user()->id);
      $doctor_serves = hdoctor_serve::get();
      $user_axams = huser_axam::where('user_id',$users -> id)->get();
      $serves = hserve::get();
      $lab_prices = hlabe_price::get();
      $doctors = hdoctor::get();
      $appoemints = happoemint::where('user_id',$users -> id)->get();
      $user_xrays = huser_xray::where('user_id',$users -> id)->get();
      $x_prices = hx_price::get();
      $user_medicens = huser_medicen::where('user_id',$users -> id)->get();
      $phar_prices = hphar_price::get();
      $user_diagnos = huser_diagno::where('user_id',$users -> id)->get();
      $mates = hmate::where('user_id',$users->id)->get();
       // return $appoemints;
        return view('front.detail', compact('appoemints','doctors','departments','specialtys','hosbitals','users','doctor_serves','user_axams','serves','lab_prices','user_xrays','x_prices','user_medicens','phar_prices','user_diagnos','mates'));
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
            $appoemint = appoemint::where('id',$id)->first();
            $user = User::where('id',$appoemint->user_id)->get();
            $labes = labe::get();
            $lab_prices = lab_price::get();
            $user_axams = user_axam::where('appoemint_id',$appoemint->id)->get();
           
          // return $user_axams;
           return view('doctor.appoemint.detail',compact('user','appoemint','labes','lab_prices','user_axams'));
        }

        public function upaxam(Request $request){
            $user_axams = new user_axam();
            $user_axams->user_id=$request->user_id;
            $user_axams->doctor_id=$request->doctor_id;  
            $user_axams->appoemint_id=$request->appoemint_id;   
            $user_axams->labe_id=$request->labe_id; 
            $user_axams->lab_price_id=$request->lab_price_id; 
           
            $user_axams->total=$request->total;
           
            $user_axams->save();
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function getprice(Request $request ){
          
            $lab_prices = lab_price::whereLabeId($request->labe_id)->pluck('price','id');
        return response()->json($lab_prices);
        }
}
