<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fserve;
use App\Http\Requests\FHdoctor_serveRequest;
use App\model\fhosbital;
use Hash;
use Auth;
use App\Image;
use PDF;
use DB;

class DoctorServeController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hdoctor_serves = fdoctor_serve::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.doctorserve.index',compact('hosbital','hdoctor_serves'));
    }
    public function create(){
      $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
      $hserves = fserve::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = fdoctor::where('fhosbital_id',$hosbital -> id)->active()->get();
     
        return view('fhosbital.doctorserve.create',compact('hosbital','hdoctors','hserves'));
    }
    public function save(FHdoctor_serveRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
         $hdoctorserve = fdoctor_serve::create([
            
            'fserve_id' => $request -> fserve_id,
            'fdoctor_id' => $request -> fdoctor_id,
            'price' => $request -> price,
            'active' => $request -> active,
            'fhosbital_id' =>(auth::user('fhosbitall')->id),

        ]);
                 
        return redirect()->route('fhosbital.doctorserves')->with(['success'=>'تم ألحفظ  بنجاح']);
        }catch(\Exception $ex){
        return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hdoctor_serve = fdoctor_serve::selection()->find($id);
        if(!$hdoctor_serve){
        return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);}
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hdoctors = fdoctor::where('fhosbital_id',$hosbital -> id)->active()->get(); 
        $hserves = fserve::where('fhosbital_id',$hosbital -> id)->active()->get();
       
        return view('fhosbital.doctorserve.edit',compact('hdoctor_serve','hosbital','hdoctors','hserves'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_serve, FHdoctor_serveRequest $request){
        try{
        $hdoctor_serve = fdoctor_serve::selection()->find($doctor_serve);
        if(!$hdoctor_serve)
        return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
       
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $hdoctor_serve -> update($request -> except('_token'));

        DB::commit();

        return redirect()->route('fhosbital.doctorserves')->with(['success'=>'تم ألتعديل  بنجاح']);
    }catch(\Exception $ex){
        DB::rollback();
        return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
    }
    }

    public function destroy($id){
        try{
            $hdoctorse = fdoctor_serve::find($id);
            if(!$hdoctorse){
                return redirect() -> route('fhosbital.doctorserves',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $hdoctorse -> delete();
            return redirect()->route('fhosbital.doctorserves')->with(['success'=>'تم حذف ألبيانات بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
