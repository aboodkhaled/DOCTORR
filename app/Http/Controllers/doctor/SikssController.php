<?php

namespace App\Http\Controllers\doctor;

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
use App\model\user_xray;
use App\model\lab_price;
use App\model\xray;
use App\model\x_price;
use App\model\pharmice;
use App\model\user_medicen;
use App\model\phar_price;
use App\model\user_diagno;
use App\model\mate;
class SikssController extends Controller
{
    public function index(){
     $departments = department::active()->get();
      $specialtys = specialty::active()->get();
      $users = User::get();
      $doctor_serves = doctor_serve::get();
      $lab_prices = lab_price::get();
      $x_prices = x_price::get();
      $phar_prices = phar_price::get();
      $serves = serve::get();
      $doctor = doctor::find(auth('doctorr')->user()->id);
      $appoemints = appoemint::where('doctor_id',$doctor -> id)->get();
        
       // return $appoemints;
        return view('doctor.appoemint.index', compact('appoemints','doctor','departments','specialtys','users','doctor_serves','lab_prices','x_prices','phar_prices','serves'));
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
            $appoemint = appoemint::where('id',$id)->first();
            $user = User::where('id',$appoemint->user_id)->get();
            $labes = labe::get();
            $lab_prices = lab_price::get();
            $user_axams = user_axam::where('appoemint_id',$appoemint->id)->get();
            $xrays = xray::get();
            $user_xrays = user_xray::where('appoemint_id',$appoemint->id)->get();
            $x_prices = x_price::get();
            $pharmices = pharmice::get();
            $user_medicens = user_medicen::where('appoemint_id',$appoemint->id)->get();
            $phar_prices = phar_price::get();
            $user_diagnos = user_diagno::where('appoemint_id',$appoemint->id)->get();
            $mates = mate::where('appoemint_id',$appoemint->id)->get();
          
          // return $user_axams;
           return view('doctor.appoemint.detail',compact('user','appoemint','labes','lab_prices','user_axams','xrays','user_xrays','x_prices','pharmices','user_medicens','phar_prices','user_diagnos','mates'));
        }

        public function upaxam(Request $request){
            $user_axams = new user_axam();
            $user_axams->user_id=$request->user_id;
            $user_axams->doctor_id=$request->doctor_id;  
            $user_axams->appoemint_id=$request->appoemint_id;   
            $user_axams->labe_id=$request->labe_id; 
            $user_axams->lab_price_id=$request->lab_price_id; 
            $user_axams->save();

     $user = User::where('id',$user_axams -> user_id)->get();
     $user_axam = user_axam::latest()->first();
     Notification::send($user, new \App\Notifications\user_axamm($user_axam));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upxray(Request $request){
            $user_xrays = new user_xray();
            $user_xrays->user_id=$request->user_id;
            $user_xrays->doctor_id=$request->doctor_id;  
            $user_xrays->appoemint_id=$request->appoemint_id;   
            $user_xrays->xray_id=$request->xray_id; 
            $user_xrays->x_price_id=$request->x_price_id; 
            $user_xrays->save();

            $user = User::where('id',$user_xrays -> user_id)->get();
            $user_xray = user_xray::latest()->first();
            Notification::send($user, new \App\Notifications\user_xrayy($user_xray));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upphar(Request $request){
            $user_medicens = new user_medicen();
            $user_medicens->user_id=$request->user_id;
            $user_medicens->doctor_id=$request->doctor_id;  
            $user_medicens->appoemint_id=$request->appoemint_id;   
            $user_medicens->pharmice_id=$request->pharmice_id; 
            $user_medicens->phar_price_id=$request->phar_price_id; 
            $user_medicens->qun=$request->qun; 
            $user_medicens->way_use=$request->way_use; 
            $user_medicens->save();

            $user = User::where('id',$user_medicens -> user_id)->get();
            $user_medicen = user_medicen::latest()->first();
            Notification::send($user, new \App\Notifications\user_medicenn($user_medicen));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function updia(Request $request){
            $user_diagnos = new user_diagno();
            $user_diagnos->user_id=$request->user_id;
            $user_diagnos->doctor_id=$request->doctor_id;  
            $user_diagnos->appoemint_id=$request->appoemint_id;   
            $user_diagnos->diago=$request->diago; 
            $user_diagnos->revew=$request->revew; 
            $user_diagnos->save();

            $user = User::where('id',$user_diagnos -> user_id)->get();
            $user_diagno = user_diagno::latest()->first();
            Notification::send($user, new \App\Notifications\user_diagnoo($user_diagno));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function getprice(Request $request ){
          
            $lab_prices = lab_price::whereLabeId($request->labe_id)->pluck('price','id');
        return response()->json($lab_prices);
        }

        public function xprice(Request $request ){
          
            $x_prices = x_price::whereXrayId($request->xray_id)->pluck('price','id');
        return response()->json($x_prices);
        }

        public function pprice(Request $request ){
          
            $phar_prices = phar_price::wherePharmiceId($request->pharmice_id)->pluck('price','id');
        return response()->json($phar_prices);
        }
}
