<?php
namespace App\Http\Controllers\clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serve3Request;
use App\model\clinic\serve3;
use App\model\clinic\serve3_price;
use App\model\clinic\serve3_tprice;
use App\model\clinic\serve3_thin;
use App\model\clinic\serve3_total;
use App\model\clinic;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class Serve3Controller extends Controller
{
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $serve3s = serve3::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.pharmice3.index', compact('clinic','serve3s'));
    }
    public function create(){
     
        return view('clinic.pharmice3.create');
    }
    public function save(Serve3Request $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $serve3 = new serve3();
        $serve3->name =  $request->name;
        $serve3->think =  $request->think;
        $serve3-> price = $request->price;
        $serve3-> thin_price = $request->thin_price;
        $serve3-> total = $request->total;
        $serve3-> active = $request->active;
        $serve3->clinic_id=(auth::user('clinic')->id);
        $serve3->save();

        $serve3_id = serve3::latest()->first()->id;
        $serve3_p = serve3::latest()->first()->price;
        $serve3_th = serve3::latest()->first()->think;
        $serve3_tp = serve3::latest()->first()->thin_price;
        $serve3_to = serve3::latest()->first()->total;

        $serve3_price = new serve3_price();
        $serve3_price ->serve3_id=$serve3_id;
        $serve3_price ->price=$serve3_p;
        $serve3_price ->clinic_id=(auth::user('clinic')->id);
        $serve3_price->save();

        $serve3_thin = new serve3_thin();
        $serve3_thin ->serve3_id=$serve3_id;
        $serve3_thin ->think=$serve3_th;
        $serve3_thin ->clinic_id=(auth::user('clinic')->id);
        $serve3_thin->save();

        $serve3_total = new serve3_total();
        $serve3_total ->serve3_id=$serve3_id;
        $serve3_total ->total=$serve3_to;
        $serve3_total ->clinic_id=(auth::user('clinic')->id);
        $serve3_total->save();

        $serve3_tprice = new serve3_tprice();
        $serve3_tprice ->serve3_id=$serve3_id;
        $serve3_tprice ->thin_price=$serve3_tp;
        $serve3_tprice ->clinic_id=(auth::user('clinic')->id);
        $serve3_tprice->save();




        DB::commit();
        return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve3 = serve3::find($id);
        if(!$serve3){
        return redirect()->route('clinic.serve3s')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('clinic.pharmice3.edit',compact('serve3'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, Serve3Request $request){
        try{
            $serve3 = serve3::find($pharmice_id);
            if(!$serve3)
            return redirect()->route('clinic.serve3s')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $serve3 -> update([
                $serve3->name =  $request->name,
                $serve3->think =  $request->think,
                $serve3-> price = $request->price,
                $serve3-> thin_price = $request->thin_price,
                $serve3-> total = $request->total,
                $serve3-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $hh =$request->think;
             $g =$request->price;
             $jj =$request->thin_price;
             $kk =$request->total;
           return $this -> k($r,$hh,$g,$jj,$kk);
    
            return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve3 = serve3::find($id);
            $serve3_price = serve3_price::where('serve3_id',$id)->first()->id;
              $serve3_pricee = serve3_price::find($serve3_price);
              $serve3_thin = serve3_thin::where('serve3_id',$id)->first()->id;
              $serve3_thinn = serve3_thin::find($serve3_thin);
              $serve3_total = serve3_total::where('serve3_id',$id)->first()->id;
              $serve3_totall = serve3_total::find($serve3_total);
              $serve3_tprice = serve3_tprice::where('serve3_id',$id)->first()->id;
              $serve3_tpricee = serve3_tprice::find($serve3_tprice);
            if(!$serve3){
                return redirect() -> route('clinic.serve3s',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $serve3 -> delete();
            $serve3_pricee -> delete();
            $serve3_thinn -> delete();
            $serve3_totall -> delete();
            $serve3_tpricee -> delete();
            return redirect()->route('clinic.serve3s')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$hh,$g,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve3_price = serve3_price::where('serve3_id',$r)->first()->id;
              $serve3_pricee = serve3_price::find($serve3_price);
          $serve3_pricee->update([
        $serve3_pricee->serve3_id=$r,
          $serve3_pricee->price=$g,] );
          DB::commit();
          return $this -> L($r,$hh,$jj,$kk);
          return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

        public function L($r,$hh,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve3_thin = serve3_thin::where('serve3_id',$r)->first()->id;
              $serve3_thinn = serve3_thin::find($serve3_thin);
          $serve3_thinn->update([
        $serve3_thinn->serve3_id=$r,
          $serve3_thinn->think=$hh,] );
          DB::commit();
          return $this -> O($r,$jj,$kk);
          return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function O($r,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve3_total = serve3_total::where('serve3_id',$r)->first()->id;
              $serve3_totall = serve3_total::find($serve3_total);
          $serve3_totall->update([
        $serve3_totall->serve3_id=$r,
          $serve3_totall->total=$kk,] );
          DB::commit();
          return $this -> I($r,$jj);
          return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function i($r,$jj){
            try{
            DB::beginTransaction();
            $serve3_tprice = serve3_tprice::where('serve3_id',$r)->first()->id;
              $serve3_tpricee = serve3_tprice::find($serve3_tprice);
          $serve3_tpricee->update([
        $serve3_tpricee->serve3_id=$r,
          $serve3_tpricee->thin_price=$jj,] );
          DB::commit();
         
          return redirect()->route('clinic.serve3s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve3s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }
}
