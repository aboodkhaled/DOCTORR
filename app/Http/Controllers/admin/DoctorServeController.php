<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\doctor;
use App\model\doctor_serve;
use App\model\serve;
use App\Http\Requests\Doctor_serveRequest;

use DB;

class DoctorServeController extends Controller
{
    public function index(){
        $doctor_serves = doctor_serve::selection()->paginate(PAGINATION_COUNT);
        return view('admin.doctorserve.index',compact('doctor_serves'));
    }
    public function create(){
      $serves = serve::active()->get();
      $doctors = doctor::active()->get();
     
        return view('admin.doctorserve.create',compact('doctors','serves'));
    }
    public function save(Doctor_serveRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
         $doctorserve = doctor_serve::create([
            
            'serve_id' => $request -> serve_id,
            'doctor_id' => $request -> doctor_id,
            'price' => $request -> price,
            'active' => $request -> active,

        ]);
                 
        return redirect()->route('admin.doctorserves')->with(['success'=>'تم ألحفظ  بنجاح']);
        }catch(\Exception $ex){
        return redirect()->route('admin.doctorserve')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $doctor_serve = doctor_serve::selection()->find($id);
        if(!$doctor_serve){
        return redirect()->route('admin.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);}
        $doctors = doctor::active()->get();
        $serves = serve::active()->get();   
        return view('admin.doctorserve.edit',compact('doctor_serve','doctors','serves'));
        }catch(\Exception $ex){
            return redirect()->route('admin.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_serve, Doctor_serveRequest $request){
        try{
        $doctor_serve = doctor_serve::selection()->find($doctor_serve);
        if(!$doctor_serve)
        return redirect()->route('admin.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
       
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $doctor_serve -> update($request -> except('_token'));

        DB::commit();

        return redirect()->route('admin.doctorserves')->with(['success'=>'تم ألتعديل  بنجاح']);
    }catch(\Exception $ex){
        DB::rollback();
        return redirect()->route('admin.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
    }
    }

    public function destroy($id){
        try{
            $doctorse = doctor_serve::find($id);
            if(!$doctorse){
                return redirect() -> route('admin.doctorserves',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $doctorse -> delete();
            return redirect()->route('admin.doctorserves')->with(['success'=>'تم حذف ألطبيب بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('admin.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
