<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\hosbital\hspecialty;
use  App\model\hosbital;
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
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hspecialtys = hspecialty::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.specialty.index',compact('hosbital','hspecialtys'));
    }

    public function create(){
        return view('hosbital.specialty.create');
    }
     
    public function save(HspecialtyRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hspecialty = new hspecialty();
            $hspecialty->special_name = ['en' => $request->special_name_en, 'ar' => $request->special_name];
            $hspecialty-> active = $request->active;
            $hspecialty->hosbital_id=(auth::user('hosbitall')->id);
            $hspecialty->save();

        DB::commit();

        return redirect()->route('hosbital.specialtys')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('hosbital.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($special_id){
  $hspecialty =  hspecialty::find($special_id);
  if(!$hspecialty)
  return redirect()->route('hosbital.specialtys')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('hosbital.specialty.edit',compact('hspecialty'));

 }

 public function update($special_id,HspecialtyRequest $request){
     try{
    $hspecialty =  hspecialty::find($special_id);
    if(!$hspecialty)
  return redirect()->route('hosbital.specialtys')->with(['error' => trans('spechial_trans.Edite')]);
  DB::beginTransaction();
  if(!$request -> has('active'))
      $request -> request->add(['active' => 0]);
      else
      $request -> request->add(['active' => 1]);
      $hspecialty -> update([
        $hspecialty->special_name = ['en' => $request->special_name_en, 'ar' => $request->special_name],
    
    $hspecialty-> active = $request->active,
    ]);
  DB::commit();
  return redirect()->route('hosbital.specialtys')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('hosbital.specialtys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($se_id){
    try{
        $hspecialty = hspecialty::find($se_id);
        if(!$hspecialty){
            return redirect() -> route('hosbital.specialtys',$se_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $hspecialty -> delete();
        return redirect()->route('hosbital.specialtys')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('hosbital.specialtys')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
