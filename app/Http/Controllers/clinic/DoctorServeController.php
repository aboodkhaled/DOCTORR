<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hserve;
use App\Http\Requests\Hdoctor_serveRequest;
use App\model\hosbital;
use Hash;
use Auth;
use App\Image;
use PDF;
use DB;

class DoctorServeController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hdoctor_serves = hdoctor_serve::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.doctorserve.index',compact('hosbital','hdoctor_serves'));
    }
    public function create(){
      $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hserves = hserve::where('hosbital_id',$hosbital -> id)->active()->get();
      $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->active()->get();
     
        return view('hosbital.doctorserve.create',compact('hosbital','hdoctors','hserves'));
    }
    public function save(hdoctor_serveRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
         $hdoctorserve = hdoctor_serve::create([
            
            'hserve_id' => $request -> hserve_id,
            'hdoctor_id' => $request -> hdoctor_id,
            'price' => $request -> price,
            'active' => $request -> active,
            'hosbital_id' =>(auth::user('hosbitall')->id),

        ]);
                 
        return redirect()->route('hosbital.doctorserves')->with(['success'=>'تم ألحفظ  بنجاح']);
        }catch(\Exception $ex){
        return redirect()->route('hosbital.doctorserve')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hdoctor_serve = hdoctor_serve::selection()->find($id);
        if(!$hdoctor_serve){
        return redirect()->route('hosbital.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);}
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->active()->get(); 
        $hserves = hserve::where('hosbital_id',$hosbital -> id)->active()->get();
       
        return view('hosbital.doctorserve.edit',compact('hdoctor_serve','hosbital','hdoctors','hserves'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_serve, Hdoctor_serveRequest $request){
        try{
        $hdoctor_serve = hdoctor_serve::selection()->find($doctor_serve);
        if(!$hdoctor_serve)
        return redirect()->route('hosbital.doctorserves')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
       
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $hdoctor_serve -> update($request -> except('_token'));

        DB::commit();

        return redirect()->route('hosbital.doctorserves')->with(['success'=>'تم ألتعديل  بنجاح']);
    }catch(\Exception $ex){
        DB::rollback();
        return redirect()->route('hosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
    }
    }

    public function destroy($id){
        try{
            $hdoctorse = hdoctor_serve::find($id);
            if(!$hdoctorse){
                return redirect() -> route('hosbital.doctorserves',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $hdoctorse -> delete();
            return redirect()->route('hosbital.doctorserves')->with(['success'=>'تم حذف ألبيانات بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.doctorserves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
