<?php

namespace App\Http\Controllers\hosbital;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hcuontry;
use App\model\hosbital\happoemint;
use App\User;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hserve;
use App\model\hosbital\hoperation;
use App\Http\Requests\DoctorRequest;
use App\model\hosbital;
use App\model\hosbital\hmate;
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
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $happoemints = happoemint::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.appoemint.index', compact('hosbital','happoemints'));
    }
    public function create(){
      $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->get();
      $users = User::get();
      $hdoctor_serves = hdoctor_serve::where('hosbital_id',$hosbital -> id)->get();
      $hserves = hserve::where('hosbital_id',$hosbital -> id)->get();
        return view('hosbital.appoemint.create',compact('hosbital','hdepartments','hspecialtys','hdoctors','users','hdoctor_serves','hserves'));
    }
    public function save(Request $request){
        
       

           
               $happoemints = new happoemint();
               $happoemints->user_id = $request->user_id;
               $happoemints->hdoctor_id = $request->hdoctor_id;
               $happoemints->hdepartment_id = $request->hdepartment_id;
               $happoemints->hspecialty_id = $request->hspecialty_id;
               $happoemints->hdoctor_serve_id = $request->hdoctor_serve_id;
               $happoemints->hserve_id = $request->hserve_id;
               $happoemints->adate = $request->adate; 
               $happoemints->reson = $request->reson;
               $happoemints->hosbital_id=(auth::user('hosbitall')->id);
               $happoemints->save();
        return redirect()->route('hosbital.appoemints')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $happoemint = happoemint::find($id);
        if(!$happoemint){
        return redirect()->route('hosbital.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);}
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->get();
      $users = User::get();
      $hdoctor_serves = hdoctor_serve::where('hosbital_id',$hosbital -> id)->get();
      $hserves = hserve::where('hosbital_id',$hosbital -> id)->get();
        return view('hosbital.appoemint.edit',compact('happoemint','hosbital','hdepartments','hspecialtys','hdoctors','users','hdoctor_serves','hserves'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($appoemint_id, Request $request){
        
        $happoemint = happoemint::find($appoemint_id);
        if(!$happoemint)
        return redirect()->route('hosbital.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        $happoemint -> update([
               $happoemint->user_id = $request->user_id,
               $happoemint->hdoctor_id = $request->hdoctor_id,
               $happoemint->hdepartment_id = $request->hdepartment_id,
               $happoemint->hspecialty_id = $request->hspecialty_id,
               $happoemint->hdoctor_serve_id = $request->hdoctor_serve_id,
               $happoemint->hserve_id = $request->hserve_id,
               $happoemint->adate = $request->adate,
               $happoemint->reson = $request->reson,
        ]);

        DB::commit();

        return redirect()->route('hosbital.appoemints')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $happoemint = happoemint::find($id);
            if(!$happoemint){
                return redirect() -> route('hosbital.appoemints',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $happoemint -> delete();
            return redirect()->route('hosbital.appoemints')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function showdetail($id){
            $happoemint = happoemint::where('id',$id)->first();
            $user = hoperation::where('happoemint_id',$id)->get();
            $hmates = hmate::where('happoemint_id',$id)->get();
            $hdoctors = hdoctor::get();
            return view('hosbital.appoemint.detail',compact('user','happoemint','hmates','hdoctors'));
        }

        public function mate(Request $request){
            $meeting = $this->createMeeting($request);
    
                hmate::create([
                    
                    'user_id' => $request->user_id,
                    'hdoctor_id' => $request->hdoctor_id,
                    'happoemint_id' => $request->happoemint_id,
                    'meeting_id' => $meeting->id,
                    'topic' => $request->topic,
                    'start_at' => $request->start_at,
                    'duration' => $meeting->duration,
                    'password' => $meeting->password,
                    'start_url' => $meeting->start_url,
                    'join_url' => $meeting->join_url,
                    'hosbital_id' => (auth::user('hosbitall')->id),
                ]);
                
                   
                return redirect()->back()->with(['success' => trans('messages.success')]);
          }

        public function getprice(Request $request ){
          
            $hdoctor_serves = hdoctor_serve::whereHserveId($request->hserve_id)->pluck('price','id');
            return response()->json($hdoctor_serves);
        }

        public function MarkAsRead_all(Request $request){
            $userunreadnotification = auth('hosbitall')->user()->unreadNotifications;
            if($userunreadnotification){
                $userunreadnotification->markAsRead();
                return back();
            }

        }
    
}
