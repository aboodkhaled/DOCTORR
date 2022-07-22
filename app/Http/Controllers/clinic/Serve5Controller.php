<?php
namespace App\Http\Controllers\clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serve5Request;
use App\model\clinic\serve5;
use App\model\clinic\serve5_price;
use App\model\clinic\serve5_tprice;
use App\model\clinic\serve5_thin;
use App\model\clinic\serve5_total;
use App\model\clinic;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class Serve5Controller extends Controller
{
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $serve5s = serve5::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.pharmice5.index', compact('clinic','serve5s'));
    }
    public function create(){
     
        return view('clinic.pharmice5.create');
    }
    public function save(Serve5Request $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $serve5 = new serve5();
        $serve5->name =  $request->name;
        $serve5->think =  $request->think;
        $serve5-> price = $request->price;
        $serve5-> thin_price = $request->thin_price;
        $serve5-> total = $request->total;
        $serve5-> active = $request->active;
        $serve5->clinic_id=(auth::user('clinic')->id);
        $serve5->save();

        $serve5_id = serve5::latest()->first()->id;
        $serve5_p = serve5::latest()->first()->price;
        $serve5_th = serve5::latest()->first()->think;
        $serve5_tp = serve5::latest()->first()->thin_price;
        $serve5_to = serve5::latest()->first()->total;

        $serve5_price = new serve5_price();
        $serve5_price ->serve5_id=$serve5_id;
        $serve5_price ->price=$serve5_p;
        $serve5_price ->clinic_id=(auth::user('clinic')->id);
        $serve5_price->save();

        $serve5_thin = new serve5_thin();
        $serve5_thin ->serve5_id=$serve5_id;
        $serve5_thin ->think=$serve5_th;
        $serve5_thin ->clinic_id=(auth::user('clinic')->id);
        $serve5_thin->save();

        $serve5_total = new serve5_total();
        $serve5_total ->serve5_id=$serve5_id;
        $serve5_total ->total=$serve5_to;
        $serve5_total ->clinic_id=(auth::user('clinic')->id);
        $serve5_total->save();

        $serve5_tprice = new serve5_tprice();
        $serve5_tprice ->serve5_id=$serve5_id;
        $serve5_tprice ->thin_price=$serve5_tp;
        $serve5_tprice ->clinic_id=(auth::user('clinic')->id);
        $serve5_tprice->save();




        DB::commit();
        return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve5 = serve5::find($id);
        if(!$serve5){
        return redirect()->route('clinic.serve5s')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('clinic.pharmice5.edit',compact('serve5'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, Serve5Request $request){
        try{
            $serve5 = serve5::find($pharmice_id);
            if(!$serve5)
            return redirect()->route('clinic.serve5s')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $serve5 -> update([
                $serve5->name =  $request->name,
                $serve5->think =  $request->think,
                $serve5-> price = $request->price,
                $serve5-> thin_price = $request->thin_price,
                $serve5-> total = $request->total,
                $serve5-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $hh =$request->think;
             $g =$request->price;
             $jj =$request->thin_price;
             $kk =$request->total;
           return $this -> k($r,$hh,$g,$jj,$kk);
    
            return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve5 = serve5::find($id);
            $serve5_price = serve5_price::where('serve5_id',$id)->first()->id;
              $serve5_pricee = serve5_price::find($serve5_price);
              $serve5_thin = serve5_thin::where('serve5_id',$id)->first()->id;
              $serve5_thinn = serve5_thin::find($serve5_thin);
              $serve5_total = serve5_total::where('serve5_id',$id)->first()->id;
              $serve5_totall = serve5_total::find($serve5_total);
              $serve5_tprice = serve5_tprice::where('serve5_id',$id)->first()->id;
              $serve5_tpricee = serve5_tprice::find($serve5_tprice);
            if(!$serve5){
                return redirect() -> route('clinic.serve5s',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $serve5 -> delete();
            $serve5_pricee -> delete();
            $serve5_thinn -> delete();
            $serve5_totall -> delete();
            $serve5_tpricee -> delete();
            return redirect()->route('clinic.serve5s')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$hh,$g,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve5_price = serve5_price::where('serve5_id',$r)->first()->id;
              $serve5_pricee = serve5_price::find($serve5_price);
          $serve5_pricee->update([
        $serve5_pricee->serve5_id=$r,
          $serve5_pricee->price=$g,] );
          DB::commit();
          return $this -> L($r,$hh,$jj,$kk);
          return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

        public function L($r,$hh,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve5_thin = serve5_thin::where('serve5_id',$r)->first()->id;
              $serve5_thinn = serve5_thin::find($serve5_thin);
          $serve5_thinn->update([
        $serve5_thinn->serve5_id=$r,
          $serve5_thinn->think=$hh,] );
          DB::commit();
          return $this -> O($r,$jj,$kk);
          return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function O($r,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve5_total = serve5_total::where('serve5_id',$r)->first()->id;
              $serve5_totall = serve5_total::find($serve5_total);
          $serve5_totall->update([
        $serve5_totall->serve5_id=$r,
          $serve5_totall->total=$kk,] );
          DB::commit();
          return $this -> I($r,$jj);
          return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function i($r,$jj){
            try{
            DB::beginTransaction();
            $serve5_tprice = serve5_tprice::where('serve5_id',$r)->first()->id;
              $serve5_tpricee = serve5_tprice::find($serve5_tprice);
          $serve5_tpricee->update([
        $serve5_tpricee->serve5_id=$r,
          $serve5_tpricee->thin_price=$jj,] );
          DB::commit();
         
          return redirect()->route('clinic.serve5s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve5s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }
}
