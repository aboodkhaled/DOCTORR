<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HserveRequest;
use App\model\fhosbital\fserve;
use App\model\fhosbital;
use Hash;
use Auth;
use App\Image;
use PDF;
use DB;

class ServeController extends Controller
{
    
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hserves = fserve::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.serve.index', compact('hosbital','hserves'));
    }
    public function create(){
     
        return view('fhosbital.serve.create');
    }
    public function save(HserveRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hserve = new fserve();
            $hserve->serv_name =  $request->serv_name;
            $hserve-> active = $request->active;
            $hserve->fhosbital_id=(auth::user('fhosbitall')->id);
            $hserve->save();

        DB::commit();
        return redirect()->route('fhosbital.serves')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('fhosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hserve = fserve::find($id);
        if(!$hserve){
        return redirect()->route('fhosbital.serves')->with(['error'=>'هذا ألخدمة غير موجود']);}
        
        return view('fhosbital.serve.edit',compact('hserve'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($serve_id, HserveRequest $request){
        try{
            $hserve = fserve::find($serve_id);
            if(!$hserve)
            return redirect()->route('fhosbital.serves')->with(['error'=>'هذا ألخدمة غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $hserve -> update([
                $hserve->serv_name =  $request->serv_name,
                $hserve-> active = $request->active,
             ]);
     
             DB::commit();
    
    
            return redirect()->route('fhosbital.serves')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hserve = fserve::find($id);
            if(!$hserve){
                return redirect() -> route('fhosbital.serves',$id)-> with(['error'=>'هذة ألخدمة غير موجودة']);
            }
            $hserve -> delete();
            return redirect()->route('fhosbital.serves')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
