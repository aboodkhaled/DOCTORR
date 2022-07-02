<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\specialty;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class SpecialtyController extends Controller
{
    public function index(){
      
        $specialtys = specialty::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.specialty.index',compact('specialtys'));
    }

    public function create(){
        return view('admin.specialty.create');
    }
     
    public function save(SpecialtyRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $specialty = new specialty();
            $specialty->special_name = $request->special_name;
            $specialty-> active = $request->active;
            
           
            $specialty->save();

        DB::commit();

        return redirect()->route('admin.specialtys')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('admin.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($special_id){
  $specialty =  specialty::find($special_id);
  if(!$specialty)
  return redirect()->route('admin.specialtys')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('admin.specialty.edit',compact('specialty'));

 }

 public function update($special_id,SpecialtyRequest $request){
     try{
    $specialty =  specialty::find($special_id);
    if(!$specialty)
  return redirect()->route('admin.specialtys')->with(['error' => trans('spechial_trans.Edite')]);
  DB::beginTransaction();
        
  
  if(!$request -> has('active'))
      $request -> request->add(['active' => 0]);
      else
      $request -> request->add(['active' => 1]);
      $specialty -> update([
        $specialty->special_name =  $request->special_name,
    
    $specialty-> active = $request->active,
    ]);
  
 

  DB::commit();
  return redirect()->route('admin.specialtys')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('admin.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($se_id){
    try{
        $specialty = specialty::find($se_id);
        if(!$specialty){
            return redirect() -> route('admin.specialtys',$se_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $specialty -> delete();
        return redirect()->route('admin.specialtys')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('admin.specialtys')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
