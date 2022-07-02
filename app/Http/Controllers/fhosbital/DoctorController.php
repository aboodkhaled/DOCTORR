<?php

namespace App\Http\Controllers\fhosbital;
use App\Events\appoiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital;
use App\model\fhosbital\fcity;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\Http\Requests\FHdoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;

use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;



  class DoctorController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hdoctors = fdoctor::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.doctor.index', compact('hosbital','hdoctors'));
    }
    public function create(){
      $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
      $hdepartments = fdepartment::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = fspecialty::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hcuontrys = fcuontry::where('fhosbital_id',$hosbital -> id)->get();
      $hcitys = fcity::where('fhosbital_id',$hosbital -> id)->get();
        return view('fhosbital.doctor.create',compact('hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));
    }
    public function save(FHdoctorRequest $request){
        
       

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $filepath = "";
            if($request->has('photo')){
                $filepath = uploadImage('doctor', $request->photo);}
               $hdoctors = new fdoctor();
               $hdoctors->doc_name =  $request->doc_name;
               $hdoctors->doc_degry =  $request->doc_degry;
               $hdoctors->sex = $request->sex;
               $hdoctors->doc_des =  $request->doc_des;
               $hdoctors->email = $request->email;
               $hdoctors->password = bcrypt($request->password);
               $hdoctors->mobile = $request->mobile; 
               $hdoctors->perth_date = $request->perth_date;
               $hdoctors->fcuontry_id =$request->fcuontry_id;
               $hdoctors->fcity_id =$request->fcity_id;
               $hdoctors->address = $request->address;
               $hdoctors->fspecialty_id =$request->fspecialty_id;
               $hdoctors->fdepartment_id =$request->fdepartment_id;
               $hdoctors->photo = $filepath;
               $hdoctors->active = $request->active;
               $hdoctors->fhosbital_id=(auth::user('fhosbitall')->id);
               $hdoctors->save();
            
         
        return redirect()->route('fhosbital.doctors')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $hdoctor = fdoctor::find($id);
        if(!$hdoctor){
        return redirect()->route('fhosbital.doctors')->with(['error'=>'هذا الطبيب غير موجود']);}
      $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
      $hdepartments = fdepartment::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = fspecialty::where('fhosbital_id',$hosbital -> id)->active()->get();
      $hcuontrys = fcuontry::where('fhosbital_id',$hosbital -> id)->get();
      $hcitys = fcity::where('fhosbital_id',$hosbital -> id)->get();
        return view('fhosbital.doctor.edit',compact('hdoctor','hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_id, FHdoctorRequest $request){
        
        $hdoctor = fdoctor::find($doctor_id);
        if(!$hdoctor)
        return redirect()->route('fhosbital.doctors')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('doctor', $request->photo);
            fdoctor::where('id', $doctor_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);

        $hdoctor -> update([
           $hdoctor->doc_name =  $request->doc_name,
               $hdoctor->doc_degry =  $request->doc_degry,
               $hdoctor->sex = $request->sex,
               $hdoctor->doc_des =  $request->doc_des,
               $hdoctor->email = $request->email,
               $hdoctor->password = bcrypt($request->password),
               $hdoctor->mobile = $request->mobile, 
               $hdoctor->perth_date = $request->perth_date,
               $hdoctor->fcuontry_id =$request->fcuontry_id,
               $hdoctor->fcity_id =$request->fcity_id,
               $hdoctor->address = $request->address,
               $hdoctor->fspecialty_id =$request->fspecialty_id,
               $hdoctor->fdepartment_id =$request->fdepartment_id,
              
               $hdoctor->active = $request->active,
        ]);

        DB::commit();

        return redirect()->route('fhosbital.doctors')->with(['success' => trans('messages.Update')]);
   
    
    }

    public function destroy($id){
        try{
            $hdoctor = fdoctor::find($id);
            if(!$hdoctor){
                return redirect() -> route('fhosbital.doctors',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $hdoctor -> delete();
            return redirect()->route('fhosbital.doctors')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function getcity(Request $request ){
          
            $hcities = fcity::whereFcuontryId($request->fcuontry_id)->pluck('name','id');
            return response()->json($hcities);
        }
    
}
