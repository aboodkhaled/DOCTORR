<?php

namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\mate;
use App\model\doctor;
use App\model\cuontry;
use App\model\appoemint;
use App\User;
use App\model\department;
use App\model\specialty;
use App\model\doctor_serve;
use App\model\serve;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;
class MateController extends Controller
{
    use MeetingZoomTrait;
    public function index(){
        $mates = mate::all();
        return view('admin.mate.index', compact('mates'));
    }

    public function create(){
        $appoemints = appoemint::get();
        $doctors = doctor::get();
        $users = User::get();
       
          return view('admin.mate.create',compact('appoemints','doctors','users'));
      }

      public function save(Request $request){
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
            
               
        return redirect()->route('admin.meeting')->with(['success' => trans('messages.success')]);
      }

      public function destroy(Request $request){
        $info = mate::find($request->id);

            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
               // online_classe::where('meeting_id', $request->id)->delete();
                mate::destroy($request->id);
            }
            else{
               // online_classe::where('meeting_id', $request->id)->delete();
               mate::destroy($request->id);
            }
            return redirect()->route('admin.meeting')->with(['success' => trans('messages.Delete')]);
      }
}
