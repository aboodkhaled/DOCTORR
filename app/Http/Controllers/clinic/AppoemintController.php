<?php

namespace App\Http\Controllers\clinic;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\clinic\serve1;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_total;
use App\model\clinic\appoemint1;
use App\model\transaction;
use App\User;
use App\model\clinic\serve1_thin;
use App\model\clinic\serve1_tprice;
use App\model\doctor_serve;
use App\model\clinic;
use App\model\admin;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Events\Newappoemint;
use DB;
use App\Http\Services\HyperpayServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use App\Http\Traits\MeetingZoomTrait;
use PDF;
use App\model\operation;
class AppoemintController extends Controller
{

    use MeetingZoomTrait;
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $appoemint1s = appoemint1::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.appoemint.index', compact('clinic','appoemint1s'));
    }
    public function create(){
       

      $clinic = clinic::find(auth('clinic')->user()->id);
      $serve1s = serve1::where('clinic_id',$clinic -> id)->get();
      $serve1_prices = serve1_price::where('clinic_id',$clinic -> id)->get();
      $serve1_thins = serve1_thin::where('clinic_id',$clinic -> id)->get();
      $users = User::get();
      $serve1_totals = serve1_total::where('clinic_id',$clinic -> id)->get();
      $serve1_tprices = serve1_tprice::where('clinic_id',$clinic -> id)->get();
        return view('clinic.appoemint.create',compact('clinic','serve1s','serve1_prices','serve1_thins','users','serve1_totals','serve1_tprices'));
    }
    public function save(Request $request){
        
       

           
               $happoemints = new appoemint1();
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
        return redirect()->route('clinic.appoemints')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $happoemint = appoemint1::find($id);
        if(!$happoemint){
        return redirect()->route('clinic.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);}
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->get();
      $users = User::get();
      $hdoctor_serves = hdoctor_serve::where('hosbital_id',$hosbital -> id)->get();
      $hserves = hserve::where('hosbital_id',$hosbital -> id)->get();
        return view('clinic.appoemint.edit',compact('happoemint','hosbital','hdepartments','hspecialtys','hdoctors','users','hdoctor_serves','hserves'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($appoemint_id, Request $request){
        
        $happoemint = appoemint1::find($appoemint_id);
        if(!$happoemint)
        return redirect()->route('clinic.appoemints')->with(['error'=>'هذا الطبيب غير موجود']);
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

        return redirect()->route('clinic.appoemints')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $happoemint = appoemint1::find($id);
            if(!$happoemint){
                return redirect() -> route('clinic.appoemints',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $happoemint -> delete();
            return redirect()->route('clinic.appoemints')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.appoemints')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function showdetail($id){
            $appoemint1 = appoemint1::where('id',$id)->first();
            $serve1s = serve1::get();
            $serve1_prices = serve1_price::get();
            $serve1_thins = serve1_thin::get();
            $users = User::get();
            $serve1_totals = serve1_total::get();
            $serve1_tprices = serve1_tprice::get();
            return view('clinic.appoemint.detail',compact('appoemint1','serve1s','serve1_prices','serve1_thins','users','serve1_totals','serve1_tprices'));
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
