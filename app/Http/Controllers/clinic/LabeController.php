<?php
namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HLabeRequest;
use App\model\hosbital\hlabe;
use App\model\hosbital\hlabe_price;
use App\model\hosbital;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class LabeController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        
        $hlabes = hlabe::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.labe.index', compact('hosbital','hlabes'));
    }
    public function create(){
     
        return view('hosbital.labe.create');
    }
    public function save(HLabeRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
            $hlabe = new hlabe();
        $hlabe->lab_name = ['en' => $request->lab_name_en, 'ar' => $request->lab_name];
        $hlabe->axam_name = ['en' => $request->axam_name_en, 'ar' => $request->axam_name];
        $hlabe-> price = $request->price;
        $hlabe-> active = $request->active;
        $hlabe->hosbital_id=(auth::user('hosbitall')->id);
       $hlabe->save();

            $labe_id = hlabe::latest()->first()->id;
            $labe_i = hlabe::latest()->first()->price;
            $hlab_price = new hlabe_price();
            $hlab_price ->hlabe_id=$labe_id;
            $hlab_price ->price=$labe_i;
            $hlab_price->hosbital_id=(auth::user('hosbitall')->id);
            $hlab_price->save();
        DB::commit();
        return redirect()->route('hosbital.labes')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('hosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hlabe = hlabe::find($id);
       $hlabe_price = hlabe_price::where('hlabe_id',$id)->get();
        if(!$hlabe){
        return redirect()->route('hosbital.labes')->with(['error'=>'هذا ألفحص غير موجود']);}
        
        return view('hosbital.labe.edit',compact('hlabe','hlabe_price'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($labe_id, HLabeRequest $request){
       try{
            $hlabe = hlabe::find($labe_id);
          
            if(!$hlabe)
            return redirect()->route('hosbital.labes')->with(['error'=>'هذا ألفحص غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
    
            $hlabe -> update([
                $hlabe->lab_name = ['en' => $request->lab_name_en, 'ar' => $request->lab_name],
                $hlabe->axam_name = ['en' => $request->axam_name_en, 'ar' => $request->axam_name],
                $hlabe-> price = $request->price,
                $hlabe-> active = $request->active,
             ]);
            
             DB::commit();
             $r=$labe_id;
             $g =$request->price;
           return $this -> n($r,$g);
     
     
            
    
            return redirect()->route('hosbital.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hlabe = hlabe::find($id);
            $hlabe_price = hlabe_price::where('hlabe_id',$id)->first()->id;
            $hlabe_pricee = hlabe_price::find($hlabe_price);
            if(!$hlabe){
                return redirect() -> route('hosbital.labes',$id)-> with(['error'=>'هذة ألفحص غير موجودة']);
            }
            $hlabe -> delete();
            $hlabe_pricee -> delete();
            return redirect()->route('hosbital.labes')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function n($r,$g){
            try{
            DB::beginTransaction();
            $hlabe_price = hlabe_price::where('hlabe_id',$r)->first()->id;
              $hlabe_pricee = hlabe_price::find($hlabe_price);
          $hlabe_pricee->update([
        $hlabe_pricee->hlabe_id=$r,
          $hlabe_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('hosbital.labes')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.labes')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
