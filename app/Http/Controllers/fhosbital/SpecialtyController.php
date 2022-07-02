<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\fhosbital\fspecialty;
use  App\model\fhosbital;
use App\Http\Requests\HspecialtyRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;

class SpecialtyController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hspecialtys = fspecialty::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.specialty.index',compact('hosbital','hspecialtys'));
    }

    public function create(){
        return view('fhosbital.specialty.create');
    }
     
    public function save(HspecialtyRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hspecialty = new fspecialty();
            $hspecialty->special_name =  $request->special_name;
            $hspecialty-> active = $request->active;
            $hspecialty->fhosbital_id=(auth::user('fhosbitall')->id);
            $hspecialty->save();

        DB::commit();

        return redirect()->route('fhosbital.specialtys')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('fhosbital.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($special_id){
  $hspecialty =  fspecialty::find($special_id);
  if(!$hspecialty)
  return redirect()->route('fhosbital.specialtys')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('fhosbital.specialty.edit',compact('hspecialty'));

 }

 public function update($special_id,HspecialtyRequest $request){
     try{
    $hspecialty =  fspecialty::find($special_id);
    if(!$hspecialty)
  return redirect()->route('fhosbital.specialtys')->with(['error' => trans('spechial_trans.Edite')]);
  DB::beginTransaction();
  if(!$request -> has('active'))
      $request -> request->add(['active' => 0]);
      else
      $request -> request->add(['active' => 1]);
      $hspecialty -> update([
        $hspecialty->special_name =  $request->special_name,
    
    $hspecialty-> active = $request->active,
    ]);
  DB::commit();
  return redirect()->route('fhosbital.specialtys')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('fhosbital.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($se_id){
    try{
        $hspecialty = fspecialty::find($se_id);
        if(!$hspecialty){
            return redirect() -> route('fhosbital.specialtys',$se_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $hspecialty -> delete();
        return redirect()->route('fhosbital.specialtys')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('fhosbital.specialtys')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
