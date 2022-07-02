<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\LabeRequest;
use App\model\labe;
use App\model\lab_price;
use DB;
class LabeController extends Controller
{
    public function index(){
        $labes = labe::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.labe.index', compact('labes'));
    }
    public function create(){
     
        return view('admin.labe.create');
    }
    public function save(LabeRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
           
           
            $labe = new labe();
        $labe->lab_name =  $request->lab_name;
        $labe->axam_name =  $request->axam_name;
      
        $labe-> price = $request->price;
       
        $labe-> active = $request->active;
        
            $labe->save();

            $labe_id = labe::latest()->first()->id;
            $labe_i = labe::latest()->first()->price;
    
            $lab_price = new lab_price();
            $lab_price ->labe_id=$labe_id;
            $lab_price ->price=$labe_i;
            $lab_price->save();
    

        DB::commit();
               
        return redirect()->route('admin.labes')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('admin.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $labe = labe::find($id);
       $labe_price = lab_price::where('labe_id',$id)->get();
        if(!$labe){
        return redirect()->route('admin.labes')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('admin.labe.edit',compact('labe','labe_price'));
        }catch(\Exception $ex){
            return redirect()->route('admin.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($labe_id, LabeRequest $request){
       try{
            $labe = labe::find($labe_id);
          
            if(!$labe)
            return redirect()->route('admin.labes')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $labe -> update([
                $labe->lab_name =  $request->lab_name,
                $labe->axam_name =  $request->axam_name,
                $labe-> price = $request->price,
                $labe-> active = $request->active,
             ]);
            
             DB::commit();
             $r=$labe_id;
             $g =$request->price;
           return $this -> n($r,$g);
     
     
            
    
            return redirect()->route('admin.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $labe = labe::find($id);
            if(!$labe){
                return redirect() -> route('admin.labes',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $labe -> delete();
            return redirect()->route('admin.labes')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function n($r,$g){
            try{
            DB::beginTransaction();
            $labe_price = lab_price::where('labe_id',$r)->first()->id;
              $labe_pricee = lab_price::find($labe_price);
          $labe_pricee->update([
        $labe_pricee->labe_id=$r,
          $labe_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('admin.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
