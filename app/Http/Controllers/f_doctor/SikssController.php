<?php

namespace App\Http\Controllers\f_doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\sik;
use App\model\blood;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fcity;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital\fdoctor;
use App\User;
use App\Http\Requests\SikRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;
use Hash;
use Auth;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\flabe;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fserve;
use App\model\admin;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fuser_axam;
use App\model\fhosbital\fuser_xray;
use App\model\fhosbital\fhlabe_price;
use App\model\fhosbital\fxray;
use App\model\fhosbital\fx_price;
use App\model\fhosbital\fpharmice;
use App\model\fhosbital\fuser_medicen;
use App\model\fhosbital\fphar_price;
use App\model\fhosbital\fuser_diagno;
use App\model\fhosbital\fmate;
class SikssController extends Controller
{
    public function index(){
     $departments = fdepartment::active()->get();
      $specialtys = fspecialty::active()->get();
      $users = User::get();
      $doctor_serves = fdoctor_serve::get();
      $lab_prices = flabe_price::get();
      $x_prices = fx_price::get();
      $phar_prices = fphar_price::get();
      $serves = fserve::get();
      $doctor = fdoctor::find(auth('f_doctor')->user()->id);
      $appoemint = fappoemint::where('fdoctor_id',$doctor -> id)->get();
        
       // return $appoemints;
        return view('f_doctor.appoemint.index', compact('appoemint','doctor','departments','specialtys','users','doctor_serves','lab_prices','x_prices','phar_prices','serves'));
    }
    public function create(){
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        $bloods = blood::get();
        return view('admin.sik.create', compact('cuontrys','citys','bloods'));
    }
    public function save(SikRequest $request){
    //    $filepath = "";
      //  if($request->has('photo')){
        //    $filepath = uploadImage('user', $request->photo);}
          //  $user = new User();
          //  $user->name = $request->name;
           // $user->email = $request->email;
           // $user->mobile = $request->mobile;
           // $user->password = bcrypt($request->password);  
           // $user-> sex = $request->sex;
           // $user-> sik_typ = $request->sik_typ;
           // $user-> socia = $request->socia;
           // $user->age = $request->age;
           // $user->blood_id = $request->blood_id;
           // $user->photo=$filepath;
           // $user->cuontry_id = $request->cuontry_id;
           // $user->city_id = $request->city_id;
           // $user->address=$request->address;
           // $user->save();

               
        //return redirect()->route('admin.siks')->with(['success'=>'تم ألحفظ  بنجاح']);
    
    }

    public function edit($id){
        
      //  $sik = User::find($id);
        
       // if(!$sik){
       // return redirect()->route('admin.siks')->with(['error'=>'هذا ألمريض غير موجود']);}
       // $bloods = blood::active()->get();
       // $cuontrys = cuontry::get();
       // $citys = city::get(); 
       // return view('admin.sik.edit',compact('sik','cuontrys','citys','bloods'));
       

    }

    public function update($sik_id, SikRequest $request){
        
      //  $sik = User::find($sik_id);
       
       // if(!$sik)
       // return redirect()->route('admin.siks')->with(['error'=>'هذا ألمريض غير موجود']);
       // DB::beginTransaction();
       // if($request->has('photo')){
         //   $filepath = uploadImage('user', $request->photo);
          //  User::where('id', $sik_id)
           // ->update([
           // 'photo' => $filepath,
           // ]);
      //  }
       // $sik -> update([
         //   $sik->name = $request->name,
           // $sik->email = $request->email,
         ///   $sik->mobile = $request->mobile,
          //  $sik->password = bcrypt($request->password),
          //  $sik-> sex = $request->sex,
          //  $sik-> sik_typ = $request->sik_typ,
           // $sik-> socia = $request->socia,
          //  $sik->age = $request->age,
          //  $sik->blood_id = $request->blood_id,
            
           // $sik->cuontry_id = $request->cuontry_id,
           // $sik->city_id = $request->city_id,
           // $sik->address=$request->address, 
        //]);
        
       
        
        
        

        //DB::commit();

       // return redirect()->route('admin.siks')->with(['success'=>'تم ألتعديل  بنجاح']);
   
    }

    public function destroy($id){
       // try{
         //   $sik = User::find($id);
           // if(!$sik){
             //   return redirect() -> route('admin.siks',$id)-> with(['error'=>'هذة ألمريض غير موجودة']);
           // }
           // $sik -> delete();
           /// return redirect()->route('admin.siks')->with(['success'=>'تم حذف ألمريض بنجاح']);
             //  }catch(\Exception $ex){
               // return redirect()->route('admin.siks')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
               // }    
    
        }

        public function showdetail($id){
            $appoemint = fappoemint::where('id',$id)->first();
            $user = User::where('id',$appoemint->user_id)->get();
            $labes = flabe::get();
            $lab_prices = flabe_price::get();
            $user_axams = fuser_axam::where('fappoemint_id',$appoemint->id)->get();
            $xrays = fxray::get();
            $user_xrays = fuser_xray::where('fappoemint_id',$appoemint->id)->get();
            $x_prices = fx_price::get();
            $pharmice = fpharmice::get();
            $user_medicens = fuser_medicen::where('fappoemint_id',$appoemint->id)->get();
            $phar_prices = fphar_price::get();
            $user_diagnos = fuser_diagno::where('fappoemint_id',$appoemint->id)->get();
            $mates = fmate::where('fappoemint_id',$appoemint->id)->get();
          
          // return $user_axams;
           return view('f_doctor.appoemint.detail',compact('user','appoemint','labes','lab_prices','user_axams','xrays','user_xrays','x_prices','pharmice','user_medicens','phar_prices','user_diagnos','mates'));
        }

        public function upaxam(Request $request){
            $user_axams = new fuser_axam();
            $user_axams->user_id=$request->user_id;
            $user_axams->fdoctor_id=$request->fdoctor_id;  
            $user_axams->fappoemint_id=$request->fappoemint_id;   
            $user_axams->flabe_id=$request->flabe_id; 
            $user_axams->flabe_price_id=$request->flabe_price_id; 
            $user_axams->save();

     $user = User::where('id',$user_axams -> user_id)->get();
     $user_axam = fuser_axam::latest()->first();
     Notification::send($user, new \App\Notifications\fuser_axamm($user_axam));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upxray(Request $request){
            $user_xrays = new fuser_xray();
            $user_xrays->user_id=$request->user_id;
            $user_xrays->fdoctor_id=$request->fdoctor_id;  
            $user_xrays->fappoemint_id=$request->fappoemint_id;   
            $user_xrays->fxray_id=$request->fxray_id; 
            $user_xrays->fx_price_id=$request->fx_price_id; 
            $user_xrays->save();

            $user = User::where('id',$user_xrays -> user_id)->get();
            $user_xray = fuser_xray::latest()->first();
            Notification::send($user, new \App\Notifications\fuser_xrayy($user_xray));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upphar(Request $request){
            $user_medicens = new fuser_medicen();
            $user_medicens->user_id=$request->user_id;
            $user_medicens->fdoctor_id=$request->fdoctor_id;  
            $user_medicens->fappoemint_id=$request->fappoemint_id;   
            $user_medicens->fpharmice_id=$request->fpharmice_id; 
            $user_medicens->fphar_price_id=$request->fphar_price_id; 
            $user_medicens->qun=$request->qun; 
            $user_medicens->way_use=$request->way_use; 
            $user_medicens->save();

            $user = User::where('id',$user_medicens -> user_id)->get();
            $user_medicen = fuser_medicen::latest()->first();
            Notification::send($user, new \App\Notifications\fuser_medicenn($user_medicen));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function updia(Request $request){
            $user_diagnos = new fuser_diagno();
            $user_diagnos->user_id=$request->user_id;
            $user_diagnos->fdoctor_id=$request->fdoctor_id;  
            $user_diagnos->fappoemint_id=$request->fappoemint_id;   
            $user_diagnos->diago=$request->diago; 
            $user_diagnos->revew=$request->revew; 
            $user_diagnos->save();

            $user = User::where('id',$user_diagnos -> user_id)->get();
            $user_diagno = fuser_diagno::latest()->first();
            Notification::send($user, new \App\Notifications\fuser_diagnoo($user_diagno));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function getprice(Request $request ){
          
            $lab_prices = flabe_price::whereFlabeId($request->flabe_id)->pluck('price','id');
        return response()->json($lab_prices);
        }

        public function xprice(Request $request ){
          
            $x_prices = fx_price::whereFxrayId($request->fxray_id)->pluck('price','id');
        return response()->json($x_prices);
        }

        public function pprice(Request $request ){
          
            $phar_prices = fphar_price::whereFpharmiceId($request->fpharmice_id)->pluck('price','id');
        return response()->json($phar_prices);
        }
}
