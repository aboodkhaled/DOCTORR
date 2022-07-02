<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\BloodRequest;
use App\model\blood;
use DB;

class BloodController extends Controller
{
    
    public function index(){
        $bloods = blood::selection()->paginate(PAGINATION_COUNT);
        return view('admin.blood.index', compact('bloods'));
    }
    public function create(){
     
        return view('admin.blood.index');
    }
    public function save(BloodRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
        
        $blood = new blood();
        $blood->blood_typ =$request->blood_typ;
        
        $blood-> active = $request->active;
         $blood->save();
         DB::commit();
        return redirect()->route('admin.bloods')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
            DB::rollback();
        return redirect()->route('admin.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $blood = blood::selection()->find($id);
        if(!$blood){
        return redirect()->route('admin.bloods')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('admin.blood.edit',compact('blood'));
        }catch(\Exception $ex){
            return redirect()->route('admin.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($blood_id, BloodRequest $request){
        try{
            $blood = blood::selection()->find($blood_id);
            if(!$blood)
            return redirect()->route('admin.bloods')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
            $blood -> update($request -> except('_token'));
            $blood -> update([
                $blood->blood_typ = $request->blood_typ,
           
           
            $blood-> active = $request->active,
            ]);
    
    
            DB::commit();
    
            return redirect()->route('admin.bloods')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $blood = blood::find($id);
            if(!$blood){
                return redirect() -> route('admin.bloods',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $blood -> delete();
            return redirect()->route('admin.bloods')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
