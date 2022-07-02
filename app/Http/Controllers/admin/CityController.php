<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\cuontry;
use  App\model\city;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;



class CityController extends Controller
{
    public function index(){
      
        $citys = city::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.city.index',compact('citys'));
    }

    public function create(){
        $cuontrys = cuontry::get();
        return view('admin.city.create',compact('cuontrys'));
    }
     
    public function store(CityRequest $request){
        try{
            DB::beginTransaction();
           
            
            $city = new city();
            $city->name =  $request->name;
            $city-> cuontry_id = $request->cuontry_id;
            $city->save();

        DB::commit();

        return redirect()->route('admin.cities.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('admin.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($city_id){
  $city =  city::find($city_id);
  if(!$city)
  return redirect()->route('admin.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  $cuontry = cuontry::get();
   return view('admin.city.edit',compact('city','cuontry'));

 }

 public function update($city_id,CityRequest $request){
     try{
    $city =  city::find($city_id);
    if(!$city)
  return redirect()->route('admin.cities.index')->with(['error' => 'هذا ألمدينة غير موجود']);
  DB::beginTransaction();
  
  $city -> update($request -> except('_token','id'));
  $city  -> update([
    $city->name =  $request->name,
    $city-> cuontry_id = $request->cuontry_id,
  ]);

  DB::commit();
  return redirect()->route('admin.cities.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('admin.cities.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($ce_id){
    try{
        $city = city::find($ce_id);
        if(!$city){
            return redirect() -> route('admin.cities.index',$ce_id)-> with(['error'=>'هذة ألمدينة غير موجودة']);
        }
        $city -> delete();
        return redirect()->route('admin.cities.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('admin.cities.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
