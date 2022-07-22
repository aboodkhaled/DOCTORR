<?php
namespace App\Http\Controllers\clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serve4Request;
use App\model\clinic\serve4;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4_tprice;
use App\model\clinic\serve4_thin;
use App\model\clinic\serve4_total;
use App\model\clinic;
use DB;
use Hash;
use Auth;
use App\Image;
use PDF;
class Serve4Controller extends Controller
{
    public function index(){
        $clinic = clinic::find(auth('clinic')->user()->id);
        $serve4s = serve4::where('clinic_id',$clinic -> id)->paginate(PAGINATION_COUNT);
        return view('clinic.pharmice4.index', compact('clinic','serve4s'));
    }
    public function create(){
     
        return view('clinic.pharmice4.create');
    }
    public function save(Serve4Request $request){
        try{

            if(!$request->has('active'))
            $request->request->add(['active' => 0]);
            else
            $request->request->add(['active' => 1]);
           
            $serve4 = new serve4();
        $serve4->name =  $request->name;
        $serve4->think =  $request->think;
        $serve4-> price = $request->price;
        $serve4-> thin_price = $request->thin_price;
        $serve4-> total = $request->total;
        $serve4-> active = $request->active;
        $serve4->clinic_id=(auth::user('clinic')->id);
        $serve4->save();

        $serve4_id = serve4::latest()->first()->id;
        $serve4_p = serve4::latest()->first()->price;
        $serve4_th = serve4::latest()->first()->think;
        $serve4_tp = serve4::latest()->first()->thin_price;
        $serve4_to = serve4::latest()->first()->total;

        $serve4_price = new serve4_price();
        $serve4_price ->serve4_id=$serve4_id;
        $serve4_price ->price=$serve4_p;
        $serve4_price ->clinic_id=(auth::user('clinic')->id);
        $serve4_price->save();

        $serve4_thin = new serve4_thin();
        $serve4_thin ->serve4_id=$serve4_id;
        $serve4_thin ->think=$serve4_th;
        $serve4_thin ->clinic_id=(auth::user('clinic')->id);
        $serve4_thin->save();

        $serve4_total = new serve4_total();
        $serve4_total ->serve4_id=$serve4_id;
        $serve4_total ->total=$serve4_to;
        $serve4_total ->clinic_id=(auth::user('clinic')->id);
        $serve4_total->save();

        $serve4_tprice = new serve4_tprice();
        $serve4_tprice ->serve4_id=$serve4_id;
        $serve4_tprice ->thin_price=$serve4_tp;
        $serve4_tprice ->clinic_id=(auth::user('clinic')->id);
        $serve4_tprice->save();




        DB::commit();
        return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.success')]);
        }catch(\Exception $ex){
        return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
        }
    }

    public function edit($id){
        try{
        $serve4 = serve4::find($id);
        if(!$serve4){
        return redirect()->route('clinic.serve4s')->with(['error'=>'هذا ألدواء غير موجود']);}
        
        return view('clinic.pharmice4.edit',compact('serve4'));
        }catch(\Exception $ex){
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);   
        }

    }

    public function update($pharmice_id, Serve4Request $request){
        try{
            $serve4 = serve4::find($pharmice_id);
            if(!$serve4)
            return redirect()->route('clinic.serve4s')->with(['error'=>'هذا ألدواء غير موجود']);
            DB::beginTransaction();
            
            if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
            
           
            $serve4 -> update([
                $serve4->name =  $request->name,
                $serve4->think =  $request->think,
                $serve4-> price = $request->price,
                $serve4-> thin_price = $request->thin_price,
                $serve4-> total = $request->total,
                $serve4-> active = $request->active,
            ]);
    
            DB::commit();

            $r=$pharmice_id;
             $hh =$request->think;
             $g =$request->price;
             $jj =$request->thin_price;
             $kk =$request->total;
           return $this -> k($r,$hh,$g,$jj,$kk);
    
            return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

    public function destroy($id){
        try{
            $serve4 = serve4::find($id);
            $serve4_price = serve4_price::where('serve4_id',$id)->first()->id;
              $serve4_pricee = serve4_price::find($serve4_price);
              $serve4_thin = serve4_thin::where('serve4_id',$id)->first()->id;
              $serve4_thinn = serve4_thin::find($serve4_thin);
              $serve4_total = serve4_total::where('serve4_id',$id)->first()->id;
              $serve4_totall = serve4_total::find($serve4_total);
              $serve4_tprice = serve4_tprice::where('serve4_id',$id)->first()->id;
              $serve4_tpricee = serve4_tprice::find($serve4_tprice);
            if(!$serve4){
                return redirect() -> route('clinic.serve4s',$id)-> with(['error'=>'هذة ألدواء غير موجودة']);
            }
            $serve4 -> delete();
            $serve4_pricee -> delete();
            $serve4_thinn -> delete();
            $serve4_totall -> delete();
            $serve4_tpricee -> delete();
            return redirect()->route('clinic.serve4s')->with(['success'=>trans('messages.Delete')]);
               }catch(\Exception $ex){
                return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }

        public function k($r,$hh,$g,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve4_price = serve4_price::where('serve4_id',$r)->first()->id;
              $serve4_pricee = serve4_price::find($serve4_price);
          $serve4_pricee->update([
        $serve4_pricee->serve4_id=$r,
          $serve4_pricee->price=$g,] );
          DB::commit();
          return $this -> L($r,$hh,$jj,$kk);
          return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
        }

        public function L($r,$hh,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve4_thin = serve4_thin::where('serve4_id',$r)->first()->id;
              $serve4_thinn = serve4_thin::find($serve4_thin);
          $serve4_thinn->update([
        $serve4_thinn->serve4_id=$r,
          $serve4_thinn->think=$hh,] );
          DB::commit();
          return $this -> O($r,$jj,$kk);
          return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function O($r,$jj,$kk){
            try{
            DB::beginTransaction();
            $serve4_total = serve4_total::where('serve4_id',$r)->first()->id;
              $serve4_totall = serve4_total::find($serve4_total);
          $serve4_totall->update([
        $serve4_totall->serve4_id=$r,
          $serve4_totall->total=$kk,] );
          DB::commit();
          return $this -> I($r,$jj);
          return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }

        public function i($r,$jj){
            try{
            DB::beginTransaction();
            $serve4_tprice = serve4_tprice::where('serve4_id',$r)->first()->id;
              $serve4_tpricee = serve4_tprice::find($serve4_tprice);
          $serve4_tpricee->update([
        $serve4_tpricee->serve4_id=$r,
          $serve4_tpricee->thin_price=$jj,] );
          DB::commit();
         
          return redirect()->route('clinic.serve4s')->with(['success' => trans('messages.Update')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->route('clinic.serve4s')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']); 
        }
    }
}
