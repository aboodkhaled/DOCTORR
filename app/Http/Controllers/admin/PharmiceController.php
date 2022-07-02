<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\PharmiceRequest;
use App\model\pharmice;
use App\model\phar_price;
use DB;
class PharmiceController extends Controller
{
    public function index(){
        $pharmices =pharmice::orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.pharmice.index', compact('pharmices'));
    }
    public function create(){
     
        return view('admin.pharmice.create');
    }
    public function save(PharmiceRequest $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $pharmice = new pharmice();
        $pharmice->name =  $request->name;
        $pharmice->use_way =  $request->use_way;
        $pharmice-> exp_date= $request->exp_date;
        $pharmice-> price = $request->price;
        $pharmice-> qun = $request->qun;
        $pharmice-> active = $request->active;
        $pharmice->save();

        $pharmice_id = pharmice::latest()->first()->id;
        $pharmice_i = pharmice::latest()->first()->price;

        $phar_price = new phar_price();
        $phar_price ->pharmice_id=$pharmice_id;
        $phar_price ->price=$pharmice_i;
        $phar_price->save();



        DB::commit();
        return redirect()->route('admin.pharmices')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('admin.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $pharmice = pharmice::find($id);
        if(!$pharmice){
        return redirect()->route('admin.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('admin.pharmice.edit',compact('pharmice'));
        }catch(\Exception $ex){
            return redirect()->route('admin.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, PharmiceRequest $request){
        try{
            $pharmice = pharmice::find($pharmice_id);
            if(!$pharmice)
            return redirect()->route('admin.pharmices')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $pharmice -> update([
               $pharmice->name =  $request->name,
               $pharmice->use_way =  $request->use_way,
               $pharmice-> exp_date=$request->exp_date,
               $pharmice-> price = $request->price,
               $pharmice-> qun = $request->qun,
               $pharmice-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $g =$request->price;
           return $this -> k($r,$g);
    
            return redirect()->route('admin.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $pharmice = pharmice::find($id);
            if(!$pharmice){
                return redirect() -> route('admin.pharmices',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $pharmice -> delete();
            return redirect()->route('admin.pharmices')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('admin.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$g){
            try{
            DB::beginTransaction();
            $phar_price = phar_price::where('pharmice_id',$r)->first()->id;
              $phar_pricee = phar_price::find($phar_price);
          $phar_pricee->update([
        $phar_pricee->pharmice_id=$r,
          $phar_pricee->price=$g,] );
          DB::commit();
          return redirect()->route('admin.pharmices')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('admin.pharmices')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }
}
