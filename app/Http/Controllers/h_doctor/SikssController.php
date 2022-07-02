<?php

namespace App\Http\Controllers\h_doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\sik;
use App\model\blood;
use App\model\hosbital\hcuontry;
use App\model\hosbital\hcity;
use App\model\hosbital\happoemint;
use App\model\hosbital\hdoctor;
use App\User;
use App\Http\Requests\SikRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;
use Hash;
use Auth;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hlabe;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hserve;
use App\model\admin;
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
class SikssController extends Controller
{
    public function index(){
     $departments = hdepartment::active()->get();
      $specialtys = hspecialty::active()->get();
      $users = User::get();
      $doctor_serves = hdoctor_serve::get();
      $lab_prices = hlabe_price::get();
      $x_prices = hx_price::get();
      $phar_prices = hphar_price::get();
      $serves = hserve::get();
      $doctor = hdoctor::find(auth('h_doctor')->user()->id);
      $appoemint = happoemint::where('hdoctor_id',$doctor -> id)->get();
        
       // return $appoemints;
        return view('h_doctor.appoemint.index', compact('appoemint','doctor','departments','specialtys','users','doctor_serves','lab_prices','x_prices','phar_prices','serves'));
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
            $appoemint = happoemint::where('id',$id)->first();
            $user = User::where('id',$appoemint->user_id)->get();
            $labes = hlabe::get();
            $lab_prices = hlabe_price::get();
            $user_axams = huser_axam::where('happoemint_id',$appoemint->id)->get();
            $xrays = hxray::get();
            $user_xrays = huser_xray::where('happoemint_id',$appoemint->id)->get();
            $x_prices = hx_price::get();
            $pharmice = hpharmice::get();
            $user_medicens = huser_medicen::where('happoemint_id',$appoemint->id)->get();
            $phar_prices = hphar_price::get();
            $user_diagnos = huser_diagno::where('happoemint_id',$appoemint->id)->get();
            $mates = hmate::where('happoemint_id',$appoemint->id)->get();
          
          // return $user_axams;
           return view('h_doctor.appoemint.detail',compact('user','appoemint','labes','lab_prices','user_axams','xrays','user_xrays','x_prices','pharmice','user_medicens','phar_prices','user_diagnos','mates'));
        }

        public function upaxam(Request $request){
            $user_axams = new huser_axam();
            $user_axams->user_id=$request->user_id;
            $user_axams->hdoctor_id=$request->hdoctor_id;  
            $user_axams->happoemint_id=$request->happoemint_id;   
            $user_axams->hlabe_id=$request->hlabe_id; 
            $user_axams->hlabe_price_id=$request->hlabe_price_id; 
            $user_axams->save();

     $user = User::where('id',$user_axams -> user_id)->get();
     $user_axam = huser_axam::latest()->first();
     Notification::send($user, new \App\Notifications\huser_axamm($user_axam));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upxray(Request $request){
            $user_xrays = new huser_xray();
            $user_xrays->user_id=$request->user_id;
            $user_xrays->hdoctor_id=$request->hdoctor_id;  
            $user_xrays->happoemint_id=$request->happoemint_id;   
            $user_xrays->hxray_id=$request->hxray_id; 
            $user_xrays->hx_price_id=$request->hx_price_id; 
            $user_xrays->save();

            $user = User::where('id',$user_xrays -> user_id)->get();
            $user_xray = huser_xray::latest()->first();
            Notification::send($user, new \App\Notifications\huser_xrayy($user_xray));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function upphar(Request $request){
            $user_medicens = new huser_medicen();
            $user_medicens->user_id=$request->user_id;
            $user_medicens->hdoctor_id=$request->hdoctor_id;  
            $user_medicens->happoemint_id=$request->happoemint_id;   
            $user_medicens->hpharmice_id=$request->hpharmice_id; 
            $user_medicens->hphar_price_id=$request->hphar_price_id; 
            $user_medicens->qun=$request->qun; 
            $user_medicens->way_use=$request->way_use; 
            $user_medicens->save();

            $user = User::where('id',$user_medicens -> user_id)->get();
            $user_medicen = huser_medicen::latest()->first();
            Notification::send($user, new \App\Notifications\huser_medicenn($user_medicen));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function updia(Request $request){
            $user_diagnos = new huser_diagno();
            $user_diagnos->user_id=$request->user_id;
            $user_diagnos->hdoctor_id=$request->hdoctor_id;  
            $user_diagnos->happoemint_id=$request->happoemint_id;   
            $user_diagnos->diago=$request->diago; 
            $user_diagnos->revew=$request->revew; 
            $user_diagnos->save();

            $user = User::where('id',$user_diagnos -> user_id)->get();
            $user_diagno = huser_diagno::latest()->first();
            Notification::send($user, new \App\Notifications\huser_diagnoo($user_diagno));
         // return $user_axams;
            return redirect()->back()->with(['success' => trans('messages.success')]);
    
        }

        public function getprice(Request $request ){
          
            $lab_prices = hlabe_price::whereHlabeId($request->hlabe_id)->pluck('price','id');
        return response()->json($lab_prices);
        }

        public function xprice(Request $request ){
          
            $x_prices = hx_price::whereHxrayId($request->hxray_id)->pluck('price','id');
        return response()->json($x_prices);
        }

        public function pprice(Request $request ){
          
            $phar_prices = hphar_price::whereHpharmiceId($request->hpharmice_id)->pluck('price','id');
        return response()->json($phar_prices);
        }
}
