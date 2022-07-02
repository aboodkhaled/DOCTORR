<?php

namespace App\Http\Controllers\hosbital;
use App\Events\appoiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hcuontry;
use App\model\hosbital;
use App\model\hosbital\hcity;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\Http\Requests\HdoctorRequest;
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
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hdoctors = hdoctor::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.doctor.index', compact('hosbital','hdoctors'));
    }
    public function create(){
      $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->active()->get();
      $hcuontrys = hcuontry::where('hosbital_id',$hosbital -> id)->get();
      $hcitys = hcity::where('hosbital_id',$hosbital -> id)->get();
        return view('hosbital.doctor.create',compact('hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));
    }
    public function save(HdoctorRequest $request){
        
       

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $filepath = "";
            if($request->has('photo')){
                $filepath = uploadImage('doctor', $request->photo);}
               $hdoctors = new hdoctor();
               $hdoctors->doc_name =  $request->doc_name;
               $hdoctors->doc_degry =  $request->doc_degry;
               $hdoctors->sex = $request->sex;
               $hdoctors->doc_des =  $request->doc_des;
               $hdoctors->email = $request->email;
               $hdoctors->password = bcrypt($request->password);
               $hdoctors->mobile = $request->mobile; 
               $hdoctors->perth_date = $request->perth_date;
               $hdoctors->hcuontry_id =$request->hcuontry_id;
               $hdoctors->hcity_id =$request->hcity_id;
               $hdoctors->address = $request->address;
               $hdoctors->hspecialty_id =$request->hspecialty_id;
               $hdoctors->hdepartment_id =$request->hdepartment_id;
               $hdoctors->photo = $filepath;
               $hdoctors->active = $request->active;
               $hdoctors->hosbital_id=(auth::user('hosbitall')->id);
               $hdoctors->save();
            
         
        return redirect()->route('hosbital.doctors')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $hdoctor = hdoctor::find($id);
        if(!$hdoctor){
        return redirect()->route('admin.doctors')->with(['error'=>'هذا الطبيب غير موجود']);}
      $hosbital = hosbital::find(auth('hosbitall')->user()->id);
      $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->active()->get();
      $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->active()->get();
      $hcuontrys = hcuontry::where('hosbital_id',$hosbital -> id)->get();
      $hcitys = hcity::where('hosbital_id',$hosbital -> id)->get();
        return view('hosbital.doctor.edit',compact('hdoctor','hosbital','hdepartments','hspecialtys','hcuontrys','hcitys'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_id, HdoctorRequest $request){
        
        $hdoctor = hdoctor::find($doctor_id);
        if(!$hdoctor)
        return redirect()->route('hosbital.doctors')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('doctor', $request->photo);
            hdoctor::where('id', $doctor_id)
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
               $hdoctor->hcuontry_id =$request->hcuontry_id,
               $hdoctor->hcity_id =$request->hcity_id,
               $hdoctor->address = $request->address,
               $hdoctor->hspecialty_id =$request->hspecialty_id,
               $hdoctor->hdepartment_id =$request->hdepartment_id,
              
               $hdoctor->active = $request->active,
        ]);

        DB::commit();

        return redirect()->route('hosbital.doctors')->with(['success' => trans('messages.Update')]);
   
    
    }

    public function destroy($id){
        try{
            $hdoctor = hdoctor::find($id);
            if(!$hdoctor){
                return redirect() -> route('hosbital.doctors',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $hdoctor -> delete();
            return redirect()->route('hosbital.doctors')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function getcity(Request $request ){
          
            $hcities = hcity::whereHcuontryId($request->hcuontry_id)->pluck('name','id');
            return response()->json($hcities);
        }
    
}
