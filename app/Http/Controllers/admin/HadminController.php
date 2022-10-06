<?php

namespace App\Http\Controllers\admin;
use App\Events\appoiment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\hadmin;
use App\model\cuontry;
use App\model\admin;
use App\model\city;
use App\model\department;
use App\model\specialty;
use App\Http\Requests\HhadminRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\doctorcreate;
use DB;

use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;



  class HadminController extends Controller
{
    public function index(){
        $hadmins = hadmin::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.hadmin.index', compact('hadmins'));
    }
    public function create(){
      
      $cuontrys = cuontry::get();
      $citys = city::get();
        return view('admin.hadmin.create',compact('cuontrys','citys'));
    }
    public function save(HhadminRequest $request){
        
       

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $filepath = "";
            if($request->has('photo')){
                $filepath = uploadImage('hadmin', $request->photo);}
               $hadmins = new hadmin();
               $hadmins->name =  $request->name;
               $hadmins->email = $request->email;
               $hadmins->photo = $filepath;
               $hadmins->password = bcrypt($request->password);
               $hadmins->mobile = $request->mobile; 
               $hadmins->cuontry_id =$request->cuontry_id;
               $hadmins->city_id =$request->city_id;
               $hadmins->address = $request->address;
               $hadmins->active = $request->active;
               
               $hadmins->save();
            
         
        return redirect()->route('admin.hadmins')->with(['success' => trans('messages.success')]);
    
    }

    public function edit($id){
        try{
        $hadmin = hadmin::find($id);
        if(!$hadmin){
        return redirect()->route('admin.hadmins')->with(['error'=>'هذا الطبيب غير موجود']);}
       
        $cuontrys = cuontry::get();
        $citys = city::get(); 
        return view('admin.hadmin.edit',compact('hadmin','cuontrys','citys'));
        }catch(\Exception $ex){
            return redirect()->route('admin.hadmins')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($hadmin_id, HhadminRequest $request){
        
        $hadmin = hadmin::find($hadmin_id);
        if(!$hadmin)
        return redirect()->route('admin.hadmins')->with(['error'=>'هذا الطبيب غير موجود']);
        DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('hadmin', $request->photo);
            hadmin::where('id', $hadmin_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $hadmin -> update([
           $hadmin->name =  $request->name,
              
               $hadmin->email = $request->email,
               $hadmin->password = bcrypt($request->password),
               $hadmin->mobile = $request->mobile, 
               $hadmin->cuontry_id =$request->cuontry_id,
               $hadmin->city_id =$request->city_id,
               $hadmin->address =$request->address,
               $hadmin->active = $request->active,
        ]);

        DB::commit();

        return redirect()->route('admin.hadmins')->with(['success' => trans('messages.Update')]);
    
    }

    public function destroy($id){
        try{
            $hadmin = hadmin::find($id);
            if(!$hadmin){
                return redirect() -> route('admin.hadmins',$id)-> with(['error'=>'هذة ألطبيب غير موجودة']);
            }
            $hadmin -> delete();
            return redirect()->route('admin.hadmins')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.hadmins')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function getcity(Request $request ){
          
            $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
            return response()->json($cities);
        }
    
}
