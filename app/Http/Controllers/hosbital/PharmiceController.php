<?php
namespace App\Http\Controllers\hosbital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\HPharmiceRequest;
use App\model\hosbital\hpharmice;
use App\model\hosbital\hphar_price;
use App\model\hosbital;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class PharmiceController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hpharmices =hpharmice::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('hosbital.pharmice.index', compact('hosbital','hpharmices'));
    }
    public function create(){
     
        return view('hosbital.pharmice.create');
    }
    public function save(HPharmiceRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $hpharmice = new hpharmice();
        $hpharmice->name =  $request->name;
        $hpharmice->use_way =  $request->use_way;
        $hpharmice-> exp_date= $request->exp_date;
        $hpharmice-> price = $request->price;
        $hpharmice-> qun = $request->qun;
        $hpharmice-> active = $request->active;
        $hpharmice->hosbital_id=(auth::user('hosbitall')->id);
        $hpharmice->save();

        $pharmice_id = hpharmice::latest()->first()->id;
        $pharmice_i = hpharmice::latest()->first()->price;

        $hphar_price = new hphar_price();
        $hphar_price ->hpharmice_id=$pharmice_id;
        $hphar_price ->price=$pharmice_i;
        $hphar_price ->hosbital_id=(auth::user('hosbitall')->id);
        $hphar_price->save();



        DB::commit();
        return redirect()->route('hosbital.pharmices')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('hosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hpharmice = hpharmice::find($id);
        if(!$hpharmice){
        return redirect()->route('hosbital.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('hosbital.pharmice.edit',compact('hpharmice'));
        }catch(\Exception $ex){
            return redirect()->route('hosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, HPharmiceRequest $request){
        try{
            $hpharmice = hpharmice::find($pharmice_id);
            if(!$hpharmice)
            return redirect()->route('hosbital.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $hpharmice -> update([
               $hpharmice->name =  $request->name,
               $hpharmice->use_way =  $request->use_way,
               $hpharmice-> exp_date=$request->exp_date,
               $hpharmice-> price = $request->price,
               $hpharmice-> qun = $request->qun,
               $hpharmice-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $g =$request->price;
           return $this -> k($r,$g);
    
            return redirect()->route('hosbital.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hpharmice = hpharmice::find($id);
            $hphar_price = hphar_price::where('hpharmice_id',$id)->first()->id;
            $hphar_pricee = hphar_price::find($hphar_price);
            if(!$hpharmice){
                return redirect() -> route('hosbital.pharmices',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $hpharmice -> delete();
            $hphar_pricee -> delete();
            return redirect()->route('hosbital.pharmices')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('hosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$g){
            try{
            DB::beginTransaction();
            $hphar_price = hphar_price::where('hpharmice_id',$r)->first()->id;
              $hphar_pricee = hphar_price::find($hphar_price);
          $hphar_pricee->update([
        $hphar_pricee->hpharmice_id=$r,
          $hphar_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('hosbital.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('hosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
