<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServeRequest;
use App\model\serve;
use DB;

class ServeController extends Controller
{
    
    public function index(){
        $serves = serve::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.serve.index', compact('serves'));
    }
    public function create(){
     
        return view('admin.serve.create');
    }
    public function save(ServeRequest $request){
        try{
            DB::beginTransaction();

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
          
            $serve = new serve();
            $serve->serv_name =  $request->serv_name;
            $serve-> active = $request->active;
            $serve->save();

        DB::commit();
        return redirect()->route('admin.serves')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('admin.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve = serve::find($id);
        if(!$serve){
        return redirect()->route('admin.serves')->with(['error'=>'هذا ألخدمة غير موجود']);}
        
        return view('admin.serve.edit',compact('serve'));
        }catch(\Exception $ex){
            return redirect()->route('admin.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($serve_id, ServeRequest $request){
        try{
            $serve = serve::find($serve_id);
            if(!$serve)
            return redirect()->route('admin.serves')->with(['error'=>'هذا ألخدمة غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $serve -> update([
                $serve->serv_name =  $request->serv_name,
                $serve-> active = $request->active,
             ]);
     
             DB::commit();
    
    
            return redirect()->route('admin.serves')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve = serve::find($id);
            if(!$serve){
                return redirect() -> route('admin.serves',$id)-> with(['error'=>'هذة ألخدمة غير موجودة']);
            }
            $serve -> delete();
            return redirect()->route('admin.serves')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.serves')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
}
