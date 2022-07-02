<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\hosbital\hcuontry;
use  App\model\hosbital\hcity;
use  App\model\hosbital;
use App\Http\Requests\HCityRequest;
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
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hcitys = hcity::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.city.index',compact('hosbital','hcitys'));
    }

    public function create(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hcuontrys = hcuontry::where('hosbital_id',$hosbital -> id)->get();
        return view('hosbital.city.create',compact('hosbital','hcuontrys'));
    }
     
    public function store(HcityRequest $request){
        try{
            DB::beginTransaction();
           
            
            $hcity = new hcity();
            $hcity->name =  $request->name;
            $hcity-> hcuontry_id = $request->hcuontry_id;
            $hcity->hosbital_id=(auth::user()->id);
            $hcity->save();

        DB::commit();

        return redirect()->route('hosbital.cities.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('hosbital.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($city_id){
  $hcity =  hcity::find($city_id);
  if(!$hcity)
  return redirect()->route('admin.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  $hosbital = hosbital::find(auth('hosbitall')->user()->id);
  $hcuontry = hcuontry::where('hosbital_id',$hosbital -> id)->get();
   return view('hosbital.city.edit',compact('hosbital','hcity','hcuontry'));

 }

 public function update($city_id,HcityRequest $request){
     try{
    $hcity =  hcity::find($city_id);
    if(!$hcity)
  return redirect()->route('hosbital.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  DB::beginTransaction();
  
  $hcity -> update($request -> except('_token','id'));
  $hcity  -> update([
    $hcity->name = $request->name,
    $hcity-> hcuontry_id = $request->hcuontry_id,
  ]);

  DB::commit();
  return redirect()->route('hosbital.cities.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('hosbital.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($ce_id){
    try{
        $hcity = hcity::find($ce_id);
        if(!$hcity){
            return redirect() -> route('hosbital.cities.index',$ce_id)-> with(['error'=>'هذة ألمدينة غير موجودة']);
        }
        $hcity -> delete();
        return redirect()->route('hosbital.cities.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('hosbital.cities.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
