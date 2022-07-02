<?php
namespace App\Http\Controllers\clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serve2Request;
use App\model\clinic\serve2;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_tprice;
use App\model\clinic\serve2_thin;
use App\model\clinic\serve2_total;
use App\model\clinic;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class Serve2Controller extends Controller
{
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $serve2s = serve2::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.pharmice2.index', compact('clinic','serve2s'));
    }
    public function create(){
     
        return view('clinic.pharmice2.create');
    }
    public function save(Serve2Request $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $serve2 = new serve2();
        $serve2->name =  $request->name;
        $serve2->think =  $request->think;
        $serve2-> price = $request->price;
        $serve2-> thin_price = $request->thin_price;
        $serve2-> total = $request->total;
        $serve2-> active = $request->active;
        $serve2->clinic_id=(auth::user('clinic')->id);
        $serve2->save();

        $serve2_id = serve2::latest()->first()->id;
        $serve2_p = serve2::latest()->first()->price;
        $serve2_th = serve2::latest()->first()->think;
        $serve2_tp = serve2::latest()->first()->thin_price;
        $serve2_to = serve2::latest()->first()->total;

        $serve2_price = new serve2_price();
        $serve2_price ->serve2_id=$serve2_id;
        $serve2_price ->price=$serve2_p;
        $serve2_price ->clinic_id=(auth::user('clinic')->id);
        $serve2_price->save();

        $serve2_thin = new serve2_thin();
        $serve2_thin ->serve2_id=$serve2_id;
        $serve2_thin ->think=$serve2_th;
        $serve2_thin ->clinic_id=(auth::user('clinic')->id);
        $serve2_thin->save();

        $serve2_total = new serve2_total();
        $serve2_total ->serve2_id=$serve2_id;
        $serve2_total ->total=$serve2_to;
        $serve2_total ->clinic_id=(auth::user('clinic')->id);
        $serve2_total->save();

        $serve2_tprice = new serve2_tprice();
        $serve2_tprice ->serve2_id=$serve2_id;
        $serve2_tprice ->thin_price=$serve2_tp;
        $serve2_tprice ->clinic_id=(auth::user('clinic')->id);
        $serve2_tprice->save();




        DB::commit();
        return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve2 = serve2::find($id);
        if(!$serve2){
        return redirect()->route('clinic.serve2s')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('clinic.pharmice2.edit',compact('serve2'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, Serve2Request $request){
        try{
            $serve2 = serve2::find($pharmice_id);
            if(!$serve2)
            return redirect()->route('clinic.serve2s')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $serve2 -> update([
                $serve2->name =  $request->name,
                $serve2->think =  $request->think,
                $serve2-> price = $request->price,
                $serve2-> thin_price = $request->thin_price,
                $serve2-> total = $request->total,
                $serve2-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $hh =$request->think;
             $g =$request->price;
             $jj =$request->thin_price;
             $kk =$request->total;
           return $this -> k($r,$hh,$g,$jj,$kk);
    
            return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve2 = serve2::find($id);
            $serve2_price = serve2_price::where('serve2_id',$id)->first()->id;
              $serve2_pricee = serve2_price::find($serve2_price);
              $serve2_thin = serve2_thin::where('serve2_id',$id)->first()->id;
              $serve2_thinn = serve2_thin::find($serve2_thin);
              $serve2_total = serve2_total::where('serve2_id',$id)->first()->id;
              $serve2_totall = serve2_total::find($serve2_total);
              $serve2_tprice = serve2_tprice::where('serve2_id',$id)->first()->id;
              $serve2_tpricee = serve2_tprice::find($serve2_tprice);
            if(!$serve2){
                return redirect() -> route('clinic.serve2s',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $serve2 -> delete();
            $serve2_pricee -> delete();
            $serve2_thinn -> delete();
            $serve2_totall -> delete();
            $serve2_tpricee -> delete();
            return redirect()->route('clinic.serve2s')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$hh,$g,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve2_price = serve2_price::where('serve2_id',$r)->first()->id;
              $serve2_pricee = serve2_price::find($serve2_price);
          $serve2_pricee->update([
        $serve2_pricee->serve2_id=$r,
          $serve2_pricee->price=$g,] );
          DB::commit();
          return $this -> L($r,$hh,$jj,$kk);
          return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

        public function L($r,$hh,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve2_thin = serve2_thin::where('serve2_id',$r)->first()->id;
              $serve2_thinn = serve2_thin::find($serve2_thin);
          $serve2_thinn->update([
        $serve2_thinn->serve2_id=$r,
          $serve2_thinn->think=$hh,] );
          DB::commit();
          return $this -> O($r,$jj,$kk);
          return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function O($r,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve2_total = serve2_total::where('serve2_id',$r)->first()->id;
              $serve2_totall = serve2_total::find($serve2_total);
          $serve2_totall->update([
        $serve2_totall->serve2_id=$r,
          $serve2_totall->total=$kk,] );
          DB::commit();
          return $this -> I($r,$jj);
          return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function i($r,$jj){
            try{
            DB::beginTransaction();
            $serve2_tprice = serve2_tprice::where('serve2_id',$r)->first()->id;
              $serve2_tpricee = serve2_tprice::find($serve2_tprice);
          $serve2_tpricee->update([
        $serve2_tpricee->serve2_id=$r,
          $serve2_tpricee->thin_price=$jj,] );
          DB::commit();
         
          return redirect()->route('clinic.serve2s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve2s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }
}
