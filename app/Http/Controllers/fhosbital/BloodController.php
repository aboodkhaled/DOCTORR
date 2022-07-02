<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HbloodRequest;
use App\model\fhosbital\fblood;
use App\model\fhosbital;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;

class BloodController extends Controller
{
    
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hbloods = fblood::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.blood.index', compact('hosbital','hbloods'));
    }
    public function create(){
     
        return view('fhosbital.blood.index');
    }
    public function save(HbloodRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
        
        $hblood = new fblood();
        $hblood->blood_typ =$request->blood_typ;
        $hblood-> active = $request->active;
        $hblood->fhosbital_id=(auth::user('fhosbitall')->id);
         $hblood->save();
         DB::commit();
        return redirect()->route('fhosbital.bloods')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
            DB::rollback();
        return redirect()->route('fhosbital.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hblood = fblood::selection()->find($id);
        if(!$hblood){
        return redirect()->route('fhosbital.bloods')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('fhosbital.blood.edit',compact('hblood'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($blood_id, HbloodRequest $request){
        try{
            $hblood = fblood::selection()->find($blood_id);
            if(!$hblood)
            return redirect()->route('fhosbital.bloods')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
            $hblood -> update($request -> except('_token'));
            $hblood -> update([
            $hblood->blood_typ = $request->blood_typ,
            $hblood-> active = $request->active,
            ]);
    
    
            DB::commit();
    
            return redirect()->route('fhosbital.bloods')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hblood = fblood::find($id);
            if(!$hblood){
                return redirect() -> route('fhosbital.bloods',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $hblood -> delete();
            return   redirect()->route('fhosbital.bloods')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.bloods')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
