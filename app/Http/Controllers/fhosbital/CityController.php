<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\fhosbital\fcuontry;
use  App\model\fhosbital\fcity;
use  App\model\fhosbital;
use App\Http\Requests\FHcityRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;



class CityController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hcitys = fcity::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.city.index',compact('hosbital','hcitys'));
    }

    public function create(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hcuontrys = fcuontry::where('fhosbital_id',$hosbital -> id)->get();
        return view('fhosbital.city.create',compact('hosbital','hcuontrys'));
    }
     
    public function store(FHcityRequest $request){
        try{
            DB::beginTransaction();
           
            
            $hcity = new fcity();
            $hcity->name =  $request->name;
            $hcity-> fcuontry_id = $request->fcuontry_id;
            $hcity->fhosbital_id=(auth::user('fhosbitall')->id);
            $hcity->save();

        DB::commit();

        return redirect()->route('fhosbital.cities.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('fhosbital.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($city_id){
  $hcity =  fcity::find($city_id);
  if(!$hcity)
  return redirect()->route('fhosbital.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
  $hcuontry = fcuontry::where('fhosbital_id',$hosbital -> id)->get();
   return view('fhosbital.city.edit',compact('hosbital','hcity','hcuontry'));

 }

 public function update($city_id,FHcityRequest $request){
     try{
    $hcity =  fcity::find($city_id);
    if(!$hcity)
  return redirect()->route('fhosbital.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  DB::beginTransaction();
  
  $hcity -> update($request -> except('_token','id'));
  $hcity  -> update([
    $hcity->name = $request->name,
    $hcity-> fcuontry_id = $request->fcuontry_id,
  ]);

  DB::commit();
  return redirect()->route('fhosbital.cities.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('fhosbital.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($ce_id){
    try{
        $hcity = fcity::find($ce_id);
        if(!$hcity){
            return redirect() -> route('fhosbital.cities.index',$ce_id)-> with(['error'=>'هذة ألمدينة غير موجودة']);
        }
        $hcity -> delete();
        return redirect()->route('fhosbital.cities.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('fhosbital.cities.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
