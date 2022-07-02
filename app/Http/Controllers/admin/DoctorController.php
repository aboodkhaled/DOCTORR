<?php

namespace App\Http\Controllers\admin;
use App\Events\appoiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\doctor;
use App\model\cuontry;
use App\model\admin;
use App\model\city;
use App\model\department;
use App\model\specialty;
use App\Http\Requests\DoctorRequest;
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
        $doctors = doctor::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.doctor.index', compact('doctors'));
    }
    public function create(){
      $departments = department::active()->get();
      $specialtys = specialty::active()->get();
      $cuontrys = cuontry::get();
      $citys = city::get();
        return view('admin.doctor.create',compact('departments','specialtys','cuontrys','citys'));
    }
    public function save(DoctorRequest $request){
        
       

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $filepath = "";
            if($request->has('photo')){
                $filepath = uploadImage('doctor', $request->photo);}
               $doctors = new doctor();
               $doctors->doc_name =  $request->doc_name;
               $doctors->doc_degry =  $request->doc_degry;
               $doctors->sex = $request->sex;
               $doctors->doc_des =  $request->doc_des;
               $doctors->email = $request->email;
               $doctors->password = bcrypt($request->password);
               $doctors->mobile = $request->mobile; 
               $doctors->perth_date = $request->perth_date;
               $doctors->cuontry_id =$request->cuontry_id;
               $doctors->city_id =$request->city_id;
               $doctors->address = $request->address;
               $doctors->specialty_id =$request->specialty_id;
               $doctors->department_id =$request->department_id;
               $doctors->photo = $filepath;
               $doctors->active = $request->active;
              
              
               
               
               $doctors->save();
            
         
        return redirect()->route('admin.doctors')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $doctor = doctor::find($id);
        if(!$doctor){
        return redirect()->route('admin.doctors')->with(['error'=>'هذا الطبيب غير موجود']);}
        $departments = department::active()->get();
        $specialtys = specialty::active()->get();  
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        return view('admin.doctor.edit',compact('doctor','departments','specialtys','cuontrys','citys'));
        }catch(\Exception $ex){
            return redirect()->route('admin.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($doctor_id, DoctorRequest $request){
        
        $doctor = doctor::find($doctor_id);
        if(!$doctor)
        return redirect()->route('admin.doctors')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('doctor', $request->photo);
            doctor::where('id', $doctor_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 1]);
            else
            $request -> request->add(['active' => 0]);
        
        $doctor -> update([
           $doctor->doc_name =  $request->doc_name,
               $doctor->doc_degry =  $request->doc_degry,
               $doctor->sex = $request->sex,
               $doctor->doc_des =  $request->doc_des,
               $doctor->email = $request->email,
               $doctor->password = bcrypt($request->password),
               $doctor->mobile = $request->mobile, 
               $doctor->perth_date = $request->perth_date,
               $doctor->cuontry_id =$request->cuontry_id,
               $doctor->city_id =$request->city_id,
               $doctor->address =$request->address,
               $doctor->specialty_id =$request->specialty_id,
               $doctor->department_id =$request->department_id,
             
               $doctor->active = $request->active,
        ]);

        DB::commit();

        return redirect()->route('admin.doctors')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $doctor = doctor::find($id);
            if(!$doctor){
                return redirect() -> route('admin.doctors',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $doctor -> delete();
            return redirect()->route('admin.doctors')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.doctors')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function getcity(Request $request ){
          
            $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
            return response()->json($cities);
        }
    
}
