<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\hosbital\hcuontry;
use  App\model\hosbital;
use App\Http\Requests\HcuontryRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;

class CuontryController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
       
        $hcuontrys = hcuontry::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.country.index',compact('hosbital','hcuontrys'));
    }

    public function create(){
        return view('hosbital.country.index');
    }
     
    public function store(HcuontryRequest $request){
        try{
            DB::beginTransaction();

            $hcuontry = new hcuontry();
            $hcuontry->name = $request->name;
            $hcuontry-> code = $request->code;
            $hcuontry-> key = $request->key;
            $hcuontry->hosbital_id=(auth::user('hosbitall')->id);
            $hcuontry->save();

        DB::commit();

        return redirect()->route('hosbital.cuontries.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('hosbital.cuontries.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($cuontry_id){
  $hcuontry =  hcuontry::find($cuontry_id);
  if(!$hcuontry)
  return redirect()->route('hosbital.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('hosbital.country.edit',compact('hcuontry'));

 }

 public function update($cuontry_id,HcuontryRequest $request){
     try{
    $hcuontry =  hcuontry::find($cuontry_id);
    if(!$hcuontry)
  return redirect()->route('hosbital.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);
  DB::beginTransaction();
  
  $hcuontry -> update([
    $hcuontry->name =  $request->name,
    $hcuontry-> code = $request->code,
    $hcuontry-> key = $request->key,
  ]);
  DB::commit();
  return redirect()->route('hosbital.cuontries.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('hosbital.cuontries.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($co_id){
    try{
        $hcuontry = hcuontry::find($co_id);
        if(!$hcuontry){
            return redirect() -> route('hosbital.cuontries.index',$co_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $hcuontry -> delete();
        return redirect()->route('hosbital.cuontries.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('hosbital.cuontries.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
