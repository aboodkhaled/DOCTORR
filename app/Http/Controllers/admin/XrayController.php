<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\XrayRequest;
use App\model\xray;
use App\model\x_price;
use DB;
class XrayController extends Controller
{
    public function index(){
        $xrays = xray::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.xray.index', compact('xrays'));
    }
    public function create(){
     
        return view('admin.xray.create');
    }
    public function save(XrayRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
           
           
            $xray = new xray();
        $xray->name =  $request->name;
        
      
        $xray-> price = $request->price;
       
        $xray-> active = $request->active;
        
            $xray->save();

            $xray_id = xray::latest()->first()->id;
            $xray_i = xray::latest()->first()->price;
    
            $x_price = new x_price();
            $x_price ->xray_id=$xray_id;
            $x_price ->price=$xray_i;
            $x_price->save();

        DB::commit();
               
        return redirect()->route('admin.x_rays')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('admin.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $xray = xray::find($id);
        $x_price = x_price::where('xray_id',$id)->get();
        if(!$xray){
        return redirect()->route('admin.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('admin.xray.edit',compact('xray','x_price'));
        }catch(\Exception $ex){
            return redirect()->route('admin.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($xray_id, XrayRequest $request){
        try{
            $xray = xray::find($xray_id);
            if(!$xray)
            return redirect()->route('admin.x_rays')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $xray -> update([
                $xray->name =  $request->name,
               
                $xray-> price = $request->price,
                $xray-> active = $request->active,
             ]);
     
             DB::commit();

             $r=$xray_id;
             $g =$request->price;
           return $this -> m($r,$g);
    
            return redirect()->route('admin.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $xray = xray::find($id);
            if(!$xray){
                return redirect() -> route('admin.x_rays',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $xray -> delete();
            return redirect()->route('admin.x_rays')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function m($r,$g){
            try{
            DB::beginTransaction();
            $x_price = x_price::where('xray_id',$r)->first()->id;
              $x_pricee = x_price::find($x_price);
          $x_pricee->update([
        $x_pricee->xray_id=$r,
          $x_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('admin.x_rays')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.x_rays')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
