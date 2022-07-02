<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\FHXrayRequest;
use App\model\fhosbital\fxray;
use App\model\fhosbital\fx_price;
use App\model\fhosbital;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;
class XrayController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
       
        $hxrays = fxray::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.xray.index', compact('hosbital','hxrays'));
    }
    public function create(){
     
        return view('fhosbital.xray.create');
    }
    public function save(FHXrayRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
           
           
            $hxray = new fxray();
        $hxray->name =  $request->name;
        $hxray-> price = $request->price;
        $hxray-> active = $request->active;
        $hxray ->fhosbital_id=(auth::user('fhosbitall')->id);
            $hxray->save();

            $xray_id = fxray::latest()->first()->id;
            $xray_i = fxray::latest()->first()->price;
    
            $hx_price = new fx_price();
            $hx_price ->fxray_id=$xray_id;
            $hx_price ->price=$xray_i;
            $hx_price ->fhosbital_id=(auth::user('fhosbitall')->id);
            $hx_price->save();

        DB::commit();
               
        return redirect()->route('fhosbital.x_rays')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('fhosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hxray = fxray::find($id);
        $hx_price = fx_price::where('fxray_id',$id)->get();
        if(!$hxray){
        return redirect()->route('fhosbital.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('fhosbital.xray.edit',compact('hxray','hx_price'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($xray_id, FHXrayRequest $request){
        try{
            $hxray = fxray::find($xray_id);
            if(!$hxray)
            return redirect()->route('fhosbital.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $hxray -> update([
                $hxray->name =  $request->name,
               
                $hxray-> price = $request->price,
                $hxray-> active = $request->active,
             ]);
     
             DB::commit();

             $r=$xray_id;
             $g =$request->price;
           return $this -> m($r,$g);
    
            return redirect()->route('fhosbital.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hxray = fxray::find($id);
            $hx_price = fx_price::where('fxray_id',$id)->first()->id;
            $hx_pricee = fx_price::find($hx_price);
            if(!$hxray){
                return redirect() -> route('fhosbital.x_rays',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $hxray -> delete();
            $hx_pricee -> delete();
            return redirect()->route('fhosbital.x_rays')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function m($r,$g){
            try{
            DB::beginTransaction();
            $hx_price = fx_price::where('fxray_id',$r)->first()->id;
              $hx_pricee = fx_price::find($hx_price);
          $hx_pricee->update([
        $hx_pricee->fxray_id=$r,
          $hx_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('fhosbital.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
