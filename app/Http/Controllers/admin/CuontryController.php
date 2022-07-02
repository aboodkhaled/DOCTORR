<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\cuontry;
use App\Http\Requests\CuontryRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class CuontryController extends Controller
{
    public function index(){
      
        $cuontrys = cuontry::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.country.index',compact('cuontrys'));
    }

    public function create(){
        return view('admin.country.index');
    }
     
    public function store(CuontryRequest $request){
        try{
            DB::beginTransaction();

            $cuontry = new cuontry();
            $cuontry->name =  $request->name;
            $cuontry-> code = $request->code;
            $cuontry-> key = $request->key;
            $cuontry->save();

        DB::commit();

        return redirect()->route('admin.cuontries.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('admin.cuontries.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($cuontry_id){
  $cuontry =  cuontry::find($cuontry_id);
  if(!$cuontry)
  return redirect()->route('admin.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('admin.country.edit',compact('cuontry'));

 }

 public function update($cuontry_id,CuontryRequest $request){
     try{
    $cuontry =  cuontry::find($cuontry_id);
    if(!$cuontry)
  return redirect()->route('admin.cuontries.index')->with(['error' => 'هذا ألتخصص غير موجود']);
  DB::beginTransaction();
  
  $cuontry -> update([
    $cuontry->name =  $request->name,
    $cuontry-> code = $request->code,
    $cuontry-> key = $request->key,
  ]);
  DB::commit();
  return redirect()->route('admin.cuontries.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('admin.cuontries.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($co_id){
    try{
        $cuontry = cuontry::find($co_id);
        if(!$cuontry){
            return redirect() -> route('admin.cuontries.index',$co_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $cuontry -> delete();
        return redirect()->route('admin.cuontries.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('admin.cuontries.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
