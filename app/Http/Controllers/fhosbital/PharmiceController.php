<?php
namespace App\Http\Controllers\fhosbital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\FHPharmiceRequest;
use App\model\fhosbital\fpharmice;
use App\model\fhosbital\fphar_price;
use App\model\fhosbital;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class PharmiceController extends Controller
{
    public function index(){
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hpharmices =fpharmice::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        return view('fhosbital.pharmice.index', compact('hosbital','hpharmices'));
    }
    public function create(){
     
        return view('fhosbital.pharmice.create');
    }
    public function save(FHPharmiceRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $hpharmice = new fpharmice();
        $hpharmice->name =  $request->name;
        $hpharmice->use_way =  $request->use_way;
        $hpharmice-> exp_date= $request->exp_date;
        $hpharmice-> price = $request->price;
        $hpharmice-> qun = $request->qun;
        $hpharmice-> active = $request->active;
        $hpharmice->fhosbital_id=(auth::user('fhosbitall')->id);
        $hpharmice->save();

        $pharmice_id = fpharmice::latest()->first()->id;
        $pharmice_i = fpharmice::latest()->first()->price;

        $hphar_price = new fphar_price();
        $hphar_price ->fpharmice_id=$pharmice_id;
        $hphar_price ->price=$pharmice_i;
        $hphar_price ->fhosbital_id=(auth::user('fhosbitall')->id);
        $hphar_price->save();



        DB::commit();
        return redirect()->route('fhosbital.pharmices')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('fhosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $hpharmice = fpharmice::find($id);
        if(!$hpharmice){
        return redirect()->route('fhosbital.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('fhosbital.pharmice.edit',compact('hpharmice'));
        }catch(\Exception $ex){
            return redirect()->route('fhosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, FHPharmiceRequest $request){
        try{
            $hpharmice = fpharmice::find($pharmice_id);
            if(!$hpharmice)
            return redirect()->route('fhosbital.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);
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
    
            return redirect()->route('fhosbital.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $hpharmice = fpharmice::find($id);
            $hphar_price = fphar_price::where('fpharmice_id',$id)->first()->id;
            $hphar_pricee = fphar_price::find($hphar_price);
            if(!$hpharmice){
                return redirect() -> route('fhosbital.pharmices',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $hpharmice -> delete();
            $hphar_pricee -> delete();
            return redirect()->route('fhosbital.pharmices')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('fhosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$g){
            try{
            DB::beginTransaction();
            $hphar_price = fphar_price::where('fpharmice_id',$r)->first()->id;
              $hphar_pricee = fphar_price::find($hphar_price);
          $hphar_pricee->update([
        $hphar_pricee->fpharmice_id=$r,
          $hphar_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('fhosbital.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('fhosbital.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
