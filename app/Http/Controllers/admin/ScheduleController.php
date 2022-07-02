<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;

use App\model\schedule;

use App\Http\Requests\ScheduleRequest;
use App\model\doctor;
use DB;

class ScheduleController extends Controller
{
    public function index(){
        $schedules = schedule::selection()->paginate(PAGINATION_COUNT);
        $doctors = doctor::active()->get();
        return view('admin.schedule.index',compact('schedules','doctors'));
    }
    public function create(){
     
      $doctors = doctor::active()->get();
     
      return view('admin.schedule.create',compact('doctors'));
    }
    public function save(ScheduleRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
         $schedule = schedule::create([            
            'doctor_id' => $request -> doctor_id,
            'day' => $request -> day,
            'stime' => $request -> stime,
            'etime' => $request -> etime,
            'active' => $request -> active,

        ]);
                   
        return redirect()->route('admin.schedules')->with(['success'=>'تم ألحفظ  بنجاح']);
        }catch(\Exception $ex){
        return redirect()->route('admin.schedules')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $schedule = schedule::selection()->find($id);
        if(!$schedule){
        return redirect()->route('admin.schedules')->with(['error'=>'هذا الطبيب غير موجود']);}
        $doctors = doctor::active()->get();
           
        return view('admin.schedule.edit',compact('schedule','doctors'));
        }catch(\Exception $ex){
            return redirect()->route('admin.schedules')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($schedule, ScheduleRequest $request){
        try{
        $schedule = schedule::selection()->find($schedule);
        if(!$schedule)
        return redirect()->route('admin.schedules')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
       
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $schedule -> update($request -> except('_token'));

        DB::commit();

        return redirect()->route('admin.schedules')->with(['success'=>'تم ألتعديل  بنجاح']);
    }catch(\Exception $ex){
        DB::rollback();
        return redirect()->route('admin.schedule')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
    }
    }

    public function destroy($id){
        try{
            $schedulee = schedule::find($id);
            if(!$schedulee){
                return redirect() -> route('admin.schedules',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $schedulee -> delete();
            return redirect()->route('admin.schedules')->with(['success'=>'تم حذف ألطبيب بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('admin.schedules')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
