<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HXrayRequest;
use App\model\hosbital\hxray;
use App\model\hosbital\hx_price;
use App\model\hosbital;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;
class XrayController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
       
        $hxrays = hxray::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.xray.index', compact('hosbital','hxrays'));
    }
    public function create(){
     
        return view('hosbital.xray.create');
    }
    public function save(HXrayRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
           
           
            $hxray = new hxray();
        $hxray->name = ['en' => $request->name_en, 'ar' => $request->name];
        $hxray-> price = $request->price;
        $hxray-> active = $request->active;
        $hxray ->hosbital_id=(auth::user('hosbitall')->id);
            $hxray->save();

            $xray_id = hxray::latest()->first()->id;
            $xray_i = hxray::latest()->first()->price;
    
            $hx_price = new hx_price();
            $hx_price ->hxray_id=$xray_id;
            $hx_price ->price=$xray_i;
            $hx_price ->hosbital_id=(auth::user('hosbitall')->id);
            $hx_price->save();

        DB::commit();
               
        return redirect()->route('hosbital.x_rays')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hxray = hxray::find($id);
        $hx_price = hx_price::where('hxray_id',$id)->get();
        if(!$hxray){
        return redirect()->route('admin.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('hosbital.xray.edit',compact('hxray','hx_price'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($xray_id, HXrayRequest $request){
        try{
            $hxray = hxray::find($xray_id);
            if(!$hxray)
            return redirect()->route('hosbital.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $hxray -> update([
                $hxray->name = ['en' => $request->name_en, 'ar' => $request->name],
               
                $hxray-> price = $request->price,
                $hxray-> active = $request->active,
             ]);
     
             DB::commit();

             $r=$xray_id;
             $g =$request->price;
           return $this -> m($r,$g);
    
            return redirect()->route('hosbital.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hxray = hxray::find($id);
            $hx_price = hx_price::where('hxray_id',$id)->first()->id;
            $hx_pricee = hx_price::find($hx_price);
            if(!$hxray){
                return redirect() -> route('hosbital.x_rays',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $hxray -> delete();
            $hx_pricee -> delete();
            return redirect()->route('hosbital.x_rays')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function m($r,$g){
            try{
            DB::beginTransaction();
            $hx_price = hx_price::where('hxray_id',$r)->first()->id;
              $hx_pricee = hx_price::find($hx_price);
          $hx_pricee->update([
        $hx_pricee->hxray_id=$r,
          $hx_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('hosbital.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
