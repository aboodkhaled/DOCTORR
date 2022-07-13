<?php

namespace App\Http\Controllers\fhosbital;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fappoemint;
use App\User;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fdoctor_serve;
use App\model\hosbital\fserve;
use App\model\fhosbital\foperation;
use App\Http\Requests\DoctorRequest;
use App\model\fhosbital;
use App\model\fhosbital\fmate;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;

use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class AppoemintController extends Controller
{

    use MeetingZoomTrait;
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $happoemints = fappoemint::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.appoemint.index', compact('hosbital','happoemints'));
    }
    public function create(){
      $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
      $hdepartments = fdepartment::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = fspecialty::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = fdoctor::where('fhosbital_id',$hosbital -> id)->get();
      $users = User::get();
      $hdoctor_serves = fdoctor_serve::where('fhosbital_id',$hosbital -> id)->get();
      $hserves = fhserve::where('fhosbital_id',$hosbital -> id)->get();
        return view('fhosbital.appoemint.create',compact('hosbital','hdepartments','hspecialtys','hdoctors','users','hdoctor_serves','hserves'));
    }
    public function save(Request $request){
        
       

           
               $happoemints = new fappoemint();
               $happoemints->user_id = $request->user_id;
               $happoemints->fdoctor_id = $request->fdoctor_id;
               $happoemints->fdepartment_id = $request->fdepartment_id;
               $happoemints->fspecialty_id = $request->fspecialty_id;
               $happoemints->fdoctor_serve_id = $request->fdoctor_serve_id;
               $happoemints->fserve_id = $request->fserve_id;
               $happoemints->adate = $request->adate; 
               $happoemints->reson = $request->reson;
               $happoemints->fhosbital_id=(auth::user('fhosbitall')->id);
               $happoemints->save();
        return redirect()->route('fhosbital.appoemints')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $happoemint = fappoemint::find($id);
        if(!$happoemint){
        return redirect()->route('fhosbital.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);}
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
      $hdepartments = fdepartment::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = fspecialty::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = fdoctor::where('fhosbital_id',$hosbital -> id)->get();
      $users = User::get();
      $hdoctor_serves = fdoctor_serve::where('fhosbital_id',$hosbital -> id)->get();
      $hserves = fserve::where('fhosbital_id',$hosbital -> id)->get();
        return view('fhosbital.appoemint.edit',compact('happoemint','hosbital','hdepartments','hspecialtys','hdoctors','users','hdoctor_serves','hserves'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($appoemint_id, Request $request){
        
        $happoemint = fappoemint::find($appoemint_id);
        if(!$happoemint)
        return redirect()->route('fhosbital.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        $happoemint -> update([
               $happoemint->user_id = $request->user_id,
               $happoemint->fdoctor_id = $request->fdoctor_id,
               $happoemint->fdepartment_id = $request->fdepartment_id,
               $happoemint->fspecialty_id = $request->fspecialty_id,
               $happoemint->fdoctor_serve_id = $request->fdoctor_serve_id,
               $happoemint->fserve_id = $request->fserve_id,
               $happoemint->adate = $request->adate,
               $happoemint->reson = $request->reson,
        ]);

        DB::commit();

        return redirect()->route('fhosbital.appoemints')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $happoemint = fappoemint::find($id);
            if(!$happoemint){
                return redirect() -> route('fhosbital.appoemints',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $happoemint -> delete();
            return redirect()->route('fhosbital.appoemints')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function showdetail($id){
            $happoemint = fappoemint::where('id',$id)->first();
            $user = foperation::where('fappoemint_id',$id)->get();
            $users = User::where('id',$happoemint->user_id)->get();
            $hmates = fmate::where('fappoemint_id',$id)->get();
            $hdoctors = fdoctor::get();
            return view('fhosbital.appoemint.detail',compact('user','users','happoemint','hmates','hdoctors'));
        }

        public function mate(Request $request){
            $meeting = $this->createMeeting($request);
    
                hmate::create([
                    
                    'user_id' => $request->user_id,
                    'fdoctor_id' => $request->fdoctor_id,
                    'fappoemint_id' => $request->fappoemint_id,
                    'meeting_id' => $meeting->id,
                    'topic' => $request->topic,
                    'start_at' => $request->start_at,
                    'duration' => $meeting->duration,
                    'password' => $meeting->password,
                    'start_url' => $meeting->start_url,
                    'join_url' => $meeting->join_url,
                    'fhosbital_id' => (auth::user('fhosbitall')->id),
                ]);
                
                   
                return redirect()->back()->with(['success' => trans('messages.success')]);
          }

        public function getprice(Request $request ){
          
            $hdoctor_serves = fdoctor_serve::whereFserveId($request->fserve_id)->pluck('price','id');
            return response()->json($hdoctor_serves);
        }

        public function MarkAsRead_all(Request $request){
            $userunreadnotification = auth('fhosbitall')->user()->unreadNotifications;
            if($userunreadnotification){
                $userunreadnotification->markAsRead();
                return back();
            }

        }
    
}
