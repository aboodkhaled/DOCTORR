<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\plase;
use App\Http\Requests\PlaseRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;

class PlaseController extends Controller
{
    public function index(){
      
        $plases = plase::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.plase.index',compact('plases'));
    }

    public function create(){
        return view('admin.plase.index');
    }
     
    public function store(PlaseRequest $request){
        try{
            DB::beginTransaction();

            $plase = new plase();
            $plase->name =  $request->name;
           
            $plase->save();

        DB::commit();

        return redirect()->route('admin.plases.index')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('admin.plases.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($cuontry_id){
  $plase =  plase::find($cuontry_id);
  if(!$plase)
  return redirect()->route('admin.plases.index')->with(['error' => 'هذا ألتخصص غير موجود']);

   return view('admin.plase.edit',compact('plase'));

 }

 public function update($cuontry_id,PlaseRequest $request){
     try{
    $plase =  plase::find($cuontry_id);
    if(!$plase)
  return redirect()->route('admin.plases.index')->with(['error' => 'هذا ألتخصص غير موجود']);
  DB::beginTransaction();
  
  $plase -> update([
    $plase->name = $request->name,
    
  ]);
  DB::commit();
  return redirect()->route('admin.plases.index')->with(['success' => trans('messages.Update')]);
}catch(\Exception $ex){
    return redirect()->route('admin.plases.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
}
 }

 public function destroy($co_id){
    try{
        $plase = plase::find($co_id);
        if(!$plase){
            return redirect() -> route('admin.plases.index',$co_id)-> with(['error'=>'هذة ألتخصص غير موجودة']);
        }
        $plase -> delete();
        return redirect()->route('admin.plases.index')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('admin.plases.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
}
