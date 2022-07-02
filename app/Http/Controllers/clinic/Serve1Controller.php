<?php
namespace App\Http\Controllers\clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serve1Request;
use App\model\clinic\serve1;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_tprice;
use App\model\clinic\serve1_thin;
use App\model\clinic\serve1_total;
use App\model\clinic;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class Serve1Controller extends Controller
{
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $serve1s = serve1::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.pharmice.index', compact('clinic','serve1s'));
    }
    public function create(){
     
        return view('clinic.pharmice.create');
    }
    public function save(Serve1Request $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $serve1 = new serve1();
        $serve1->name =  $request->name;
        $serve1->think =  $request->think;
        $serve1-> price = $request->price;
        $serve1-> thin_price = $request->thin_price;
        $serve1-> total = $request->total;
        $serve1-> active = $request->active;
        $serve1->clinic_id=(auth::user('clinic')->id);
        $serve1->save();

        $serve1_id = serve1::latest()->first()->id;
        $serve1_p = serve1::latest()->first()->price;
        $serve1_th = serve1::latest()->first()->think;
        $serve1_tp = serve1::latest()->first()->thin_price;
        $serve1_to = serve1::latest()->first()->total;

        $serve1_price = new serve1_price();
        $serve1_price ->serve1_id=$serve1_id;
        $serve1_price ->price=$serve1_p;
        $serve1_price ->clinic_id=(auth::user('clinic')->id);
        $serve1_price->save();

        $serve1_thin = new serve1_thin();
        $serve1_thin ->serve1_id=$serve1_id;
        $serve1_thin ->think=$serve1_th;
        $serve1_thin ->clinic_id=(auth::user('clinic')->id);
        $serve1_thin->save();

        $serve1_total = new serve1_total();
        $serve1_total ->serve1_id=$serve1_id;
        $serve1_total ->total=$serve1_to;
        $serve1_total ->clinic_id=(auth::user('clinic')->id);
        $serve1_total->save();

        $serve1_tprice = new serve1_tprice();
        $serve1_tprice ->serve1_id=$serve1_id;
        $serve1_tprice ->thin_price=$serve1_tp;
        $serve1_tprice ->clinic_id=(auth::user('clinic')->id);
        $serve1_tprice->save();




        DB::commit();
        return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve1 = serve1::find($id);
        if(!$serve1){
        return redirect()->route('clinic.serve1s')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('clinic.pharmice.edit',compact('serve1'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, Serve1Request $request){
        try{
            $serve1 = serve1::find($pharmice_id);
            if(!$serve1)
            return redirect()->route('clinic.serve1s')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $serve1 -> update([
                $serve1->name =  $request->name,
                $serve1->think =  $request->think,
                $serve1-> price = $request->price,
                $serve1-> thin_price = $request->thin_price,
                $serve1-> total = $request->total,
                $serve1-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $hh =$request->think;
             $g =$request->price;
             $jj =$request->thin_price;
             $kk =$request->total;
           return $this -> k($r,$hh,$g,$jj,$kk);
    
            return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve1 = serve1::find($id);
            $serve1_price = serve1_price::where('serve1_id',$id)->first()->id;
              $serve1_pricee = serve1_price::find($serve1_price);
              $serve1_thin = serve1_thin::where('serve1_id',$id)->first()->id;
              $serve1_thinn = serve1_thin::find($serve1_thin);
              $serve1_total = serve1_total::where('serve1_id',$id)->first()->id;
              $serve1_totall = serve1_total::find($serve1_total);
              $serve1_tprice = serve1_tprice::where('serve1_id',$id)->first()->id;
              $serve1_tpricee = serve1_tprice::find($serve1_tprice);
            if(!$serve1){
                return redirect() -> route('clinic.serve1s',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $serve1 -> delete();
            $serve1_pricee -> delete();
            $serve1_thinn -> delete();
            $serve1_totall -> delete();
            $serve1_tpricee -> delete();
            return redirect()->route('clinic.serve1s')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$hh,$g,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve1_price = serve1_price::where('serve1_id',$r)->first()->id;
              $serve1_pricee = serve1_price::find($serve1_price);
          $serve1_pricee->update([
        $serve1_pricee->serve1_id=$r,
          $serve1_pricee->price=$g,] );
          DB::commit();
          return $this -> L($r,$hh,$jj,$kk);
          return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

        public function L($r,$hh,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve1_thin = serve1_thin::where('serve1_id',$r)->first()->id;
              $serve1_thinn = serve1_thin::find($serve1_thin);
          $serve1_thinn->update([
        $serve1_thinn->serve1_id=$r,
          $serve1_thinn->think=$hh,] );
          DB::commit();
          return $this -> O($r,$jj,$kk);
          return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function O($r,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve1_total = serve1_total::where('serve1_id',$r)->first()->id;
              $serve1_totall = serve1_total::find($serve1_total);
          $serve1_totall->update([
        $serve1_totall->serve1_id=$r,
          $serve1_totall->total=$kk,] );
          DB::commit();
          return $this -> I($r,$jj);
          return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function i($r,$jj){
            try{
            DB::beginTransaction();
            $serve1_tprice = serve1_tprice::where('serve1_id',$r)->first()->id;
              $serve1_tpricee = serve1_tprice::find($serve1_tprice);
          $serve1_tpricee->update([
        $serve1_tpricee->serve1_id=$r,
          $serve1_tpricee->thin_price=$jj,] );
          DB::commit();
         
          return redirect()->route('clinic.serve1s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve1s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }
}
