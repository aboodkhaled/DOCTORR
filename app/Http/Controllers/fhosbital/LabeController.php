<?php
namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\FHLabeRequest;
use App\model\fhosbital\flabe;
use App\model\fhosbital\flabe_price;
use App\model\fhosbital;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class LabeController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        
        $hlabes = flabe::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.labe.index', compact('hosbital','hlabes'));
    }
    public function create(){
     
        return view('hosbital.labe.create');
    }
    public function save(FHLabeRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hlabe = new flabe();
        $hlabe->lab_name =  $request->lab_name;
        $hlabe->axam_name =  $request->axam_name;
        $hlabe-> price = $request->price;
        $hlabe-> active = $request->active;
        $hlabe->fhosbital_id=(auth::user('fhosbitall')->id);
       $hlabe->save();

            $labe_id = flabe::latest()->first()->id;
            $labe_i = flabe::latest()->first()->price;
            $hlab_price = new flabe_price();
            $hlab_price ->flabe_id=$labe_id;
            $hlab_price ->price=$labe_i;
            $hlab_price->fhosbital_id=(auth::user('fhosbitall')->id);
            $hlab_price->save();
        DB::commit();
        return redirect()->route('fhosbital.labes')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('fhosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hlabe = flabe::find($id);
       $hlabe_price = flabe_price::where('flabe_id',$id)->get();
        if(!$hlabe){
        return redirect()->route('fhosbital.labes')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('fhosbital.labe.edit',compact('hlabe','hlabe_price'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($labe_id, FHLabeRequest $request){
       try{
            $hlabe = flabe::find($labe_id);
          
            if(!$hlabe)
            return redirect()->route('fhosbital.labes')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $hlabe -> update([
                $hlabe->lab_name =  $request->lab_name,
                $hlabe->axam_name = $request->axam_name,
                $hlabe-> price = $request->price,
                $hlabe-> active = $request->active,
             ]);
            
             DB::commit();
             $r=$labe_id;
             $g =$request->price;
           return $this -> n($r,$g);
     
     
            
    
            return redirect()->route('fhosbital.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hlabe = flabe::find($id);
            $hlabe_price = flabe_price::where('flabe_id',$id)->first()->id;
            $hlabe_pricee = flabe_price::find($hlabe_price);
            if(!$hlabe){
                return redirect() -> route('fhosbital.labes',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $hlabe -> delete();
            $hlabe_pricee -> delete();
            return redirect()->route('fhosbital.labes')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function n($r,$g){
            try{
            DB::beginTransaction();
            $hlabe_price = flabe_price::where('flabe_id',$r)->first()->id;
              $hlabe_pricee = flabe_price::find($hlabe_price);
          $hlabe_pricee->update([
        $hlabe_pricee->flabe_id=$r,
          $hlabe_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('fhosbital.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
