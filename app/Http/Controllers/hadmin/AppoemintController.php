<?php

namespace App\Http\Controllers\hadmin;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\doctor;
use App\model\cuontry;
use App\model\appoemint;
use App\User;
use App\model\department;
use App\model\specialty;
use App\model\doctor_serve;
use App\model\serve;
use App\model\operation;
use App\Http\Requests\DoctorRequest;

use App\model\mate;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;

use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fappoemint;
use App\model\transaction;

use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fserve;
use App\model\fhosbital;
use App\model\clinic;
use App\model\hadmin;

use Illuminate\Support\Facades\Notification;
use App\Events\Newappoemint;
use DB;
use App\Http\Services\HyperpayServices_aut;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use PDF;
use App\model\fhosbital\foperation;


class AppoemintController extends Controller
{

    use MeetingZoomTrait;
    public function index(){
        $admin = hadmin::find(auth('hadmin')->user()->id);
        $appoemints = fappoemint::where('hadmin_id',$admin -> id)->paginate(PAGINATION_COUNT);
        //return $appoemints;
        return view('hadmin.appoemint.index', compact('admin','appoemints'));
    }
    public function create(){
      $departments = department::active()->get();
      $specialtys = specialty::active()->get();
      $doctors = doctor::get();
      $users = User::get();
      $doctor_serves = doctor_serve::get();
      $serves = serve::get();
        return view('admin.appoemint.create',compact('departments','specialtys','doctors','users','doctor_serves','serves'));
    }
    public function save(Request $request){
        
        try{
               $appoemints = new appoemint();
               $appoemints->user_id = $request->user_id;
               $appoemints->doctor_id = $request->doctor_id;
               $appoemints->department_id = $request->department_id;
               $appoemints->specialty_id = $request->specialty_id;
               $appoemints->doctor_serve_id = $request->doctor_serve_id;
               $appoemints->serve_id = $request->serve_id;
               $appoemints->adate = $request->adate; 
               $appoemints->reson = $request->reson;
               $appoemints->save();
         
        return redirect()->route('admin.appoemints')->with(['success' => trans('messages.success')]);
    }catch(\Exception $ex){
        return redirect()->route('admin.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
    }
    
    }

    public function edit($id){
        try{
        $appoemint = appoemint::find($id);
        if(!$appoemint){
        return redirect()->route('admin.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);}
        $departments = department::active()->get();
        $specialtys = specialty::active()->get();
        $doctors = doctor::get();
        $users = User::get();
        $doctor_serves = doctor_serve::get();
        $serves = serve::get();
        return view('admin.appoemint.edit',compact('appoemint','departments','specialtys','doctors','users','doctor_serves','serves'));
        }catch(\Exception $ex){
            return redirect()->route('admin.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($appoemint_id, Request $request){
        
        $appoemint = appoemint::find($appoemint_id);
        if(!$appoemint)
        return redirect()->route('admin.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        $appoemint -> update([
               $appoemint->user_id = $request->user_id,
               $appoemint->doctor_id = $request->doctor_id,
               $appoemint->department_id = $request->department_id,
               $appoemint->specialty_id = $request->specialty_id,
               $appoemint->doctor_serve_id = $request->doctor_serve_id,
               $appoemint->serve_id = $request->serve_id,
               $appoemint->adate = $request->adate,
               $appoemint->reson = $request->reson,
        ]);

        DB::commit();

        return redirect()->route('admin.appoemints')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $appoemint = appoemint::find($id);
            if(!$appoemint){
                return redirect() -> route('admin.appoemints',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $appoemint -> delete();
            return redirect()->route('admin.appoemints')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function showdetail($id){
            $appoemint = appoemint::where('id',$id)->first();
            $user = operation::where('appoemint_id',$id)->get();
            $mates = mate::where('appoemint_id',$id)->get();
            $doctors = doctor::get();
            return view('admin.appoemint.detail',compact('user','appoemint','mates','doctors'));
        }

        public function mate(Request $request){
            $meeting = $this->createMeeting($request);
    
                mate::create([
                    
                    'user_id' => $request->user_id,
                    'doctor_id' => $request->doctor_id,
                    'appoemint_id' => $request->appoemint_id,
                    'meeting_id' => $meeting->id,
                    'topic' => $request->topic,
                    'start_at' => $request->start_at,
                    'duration' => $meeting->duration,
                    'password' => $meeting->password,
                    'start_url' => $meeting->start_url,
                    'join_url' => $meeting->join_url,
                ]);
                
                   
                return redirect()->back()->with(['success' => trans('messages.success')]);
          }

        public function getprice( ){
          
            $doctor_serves = doctor_serve::whereServeId($request->serve_id)->pluck('price','doctor_id','id');
            return response()->json($doctor_serves);
        }

        public function MarkAsRead_all(Request $request){
            $userunreadnotification = auth('admin')->user()->unreadNotifications;
           
            if($userunreadnotification){
                $userunreadnotification->markAsRead();
               
                return back();
            }

        }
    
}
