<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HserveRequest;
use App\model\hosbital\hserve;
use App\model\hosbital;
use Hash;
use Auth;
use App\Image;
use PDF;
use DB;

class ServeController extends Controller
{
    
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hserves = hserve::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.serve.index', compact('hosbital','hserves'));
    }
    public function create(){
     
        return view('hosbital.serve.create');
    }
    public function save(HserveRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hserve = new hserve();
            $hserve->serv_name =  $request->serv_name;
            $hserve-> active = $request->active;
            $hserve->hosbital_id=(auth::user('hosbitall')->id);
            $hserve->save();

        DB::commit();
        return redirect()->route('hosbital.serves')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('hosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hserve = hserve::find($id);
        if(!$hserve){
        return redirect()->route('hosbital.serves')->with(['error'=>'هذا ألخدمة غير موجود']);}
        
        return view('hosbital.serve.edit',compact('hserve'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($serve_id, HserveRequest $request){
        try{
            $hserve = hserve::find($serve_id);
            if(!$hserve)
            return redirect()->route('hosbital.serves')->with(['error'=>'هذا ألخدمة غير موجود']);
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
    
    
            return redirect()->route('hosbital.serves')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hserve = hserve::find($id);
            if(!$hserve){
                return redirect() -> route('hosbital.serves',$id)-> with(['error'=>'هذة ألخدمة غير موجودة']);
            }
            $hserve -> delete();
            return redirect()->route('hosbital.serves')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
