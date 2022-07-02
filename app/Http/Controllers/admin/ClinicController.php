<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;
use App\Model\clinic;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
use DB;
use Spatie\Translatable\HasTranslations;

use App\Http\Requests\VenpharmiceRequest;
use App\Model\venpharmice;
use App\Model\vnpharmice_detail;
use  App\model\plase;
use  App\model\city;

use App\model\clinic\serve2;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_total;
use App\model\clinic\appoemint2;
use App\model\clinic\serve2_thin;
use App\model\clinic\serve2_tprice;

use App\model\clinic\serve1;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_total;
use App\model\clinic\appoemint1;
use App\model\clinic\serve1_thin;
use App\model\clinic\serve1_tprice;


use PDF;

class ClinicController extends Controller
{
     /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
        $clinics = clinic::orderBy('id')->paginate(PAGINATION_COUNT); //use pagination here
       // return $clinics;
       return view('admin.clinic.index', compact('clinics'));
   }

   public function create(){
    $plases = plase::get();
   
       return view('admin.clinic.create',compact('plases'));
   }


   public function store(ClinicRequest $request) {
    
  

    if(!$request->has('active'))
    $request->request->add(['active' => 0]);
    else
    $request->request->add(['active' => 1]);
    if(!$request->has('status'))
    $request->request->add(['status' => 1]);
    else
    $request->request->add(['status' => 0]);
    $filepath = "";
    if($request->has('photo')){
        $filepath = uploadImage('clinic', $request->photo);}
       $clinics = new clinic();
       $clinics->name =  $request->name;
       $clinics->email = $request->email;
       $clinics->photo = $filepath;
       $clinics->password = bcrypt($request->password);  
       $clinics->mobile = $request->mobile;
       $clinics->active = $request->active;
       $clinics->plase_id = $request->plase_id;
       $clinics->address = $request->address;
       $clinics->admin = (auth::user()->name);
       // the best place on model
      

       // save tzhe new user data
       $clinics->save();
       //$venpharmice_id = venpharmice::latest()->first()->id;
       //vnpharmice_detail::create([
      //  'venpharmice_id' => $venpharmice_id,
      //  'admin' => (auth::user()->name),
      //  'sup_price' => $request->sup_price,
       //'suppay_price' => $request->suppay_price,
       //'pay_time' => $request->pay_time,
       //'pay_date' => $request->pay_date,
       //]);
      
     
            return redirect()->route('admin.clinics.index')->with(['success' => trans('messages.success')]);
        
   }

   public function edit($vp_id){
    $clinic =  clinic::find($vp_id);
    if(!$clinic)
    return redirect()->route('admin.clinic.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    $plases = plase::get();
   
     return view('admin.clinic.edit',compact('clinic','plases'));
  
   }
  
   public function update($vp_id,ClinicRequest $request){
       
      $clinic =  clinic::find($vp_id);
      if(!$clinic)
    return redirect()->route('admin.clinic.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    DB::beginTransaction();
          
          if($request->has('photo')){
              $filepath = uploadImage('clinic', $request->photo);
              clinic::where('id', $vp_id)
              ->update([
              'photo' => $filepath,
              ]);
          }
          if(!$request -> has('active'))
              $request -> request->add(['active' => 0]);
              else
              $request -> request->add(['active' => 1]);
             
          
          $clinic -> update([ 
            $clinic->name =  $request->name,
            $clinic->email = $request->email,
         
            $clinic->password = bcrypt($request->password),  
            $clinic->mobile = $request->mobile,
            $clinic->active = $request->active,
            $clinic->plase_id = $request->plase_id,
            $clinic->address = $request->address,
           
           
          ]);
      
  
          DB::commit();
    return redirect()->route('admin.clinics.index')->with(['success' => trans('messages.Update')]);
  
   }
  
   public function destroy($v_id){
      try{
          $clinic = clinic::find($v_id);
          if(!$clinic){
              return redirect() -> route('admin.clinics.index',$v_id)-> with(['error'=>'هذة ألصيدلية غير موجودة']);
          }
          $clinic -> delete();
          return redirect()->route('admin.clinics.index')->with(['success'=>trans('messages.Delete')]);
             }catch(\Exception $ex){
              return redirect()->route('admin.clinics.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
              }    
  
      }

      public function getcity(Request $request ){
          
          $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
          return response()->json($cities);
      }

      public function print($p_id){
        $clinic = clinic::where('id',$p_id)->first();
        return view('admin.clinic.print', compact('hosbital'));
      }
      public function pdf($p_id){
        $clinic = clinic::find($p_id);
        $data['venpharmice_id'] = $hosbital->id;
        $data['name'] = $hosbital->name;
        $data['cuontry_id'] = $hosbital->cuontry->name;
        $data['city_id'] = $hosbital->city->name;
        $data['address'] = $hosbital->address;
        $data['mobile'] = $hosbital->mobile;
        $data['sup_date'] = $hosbital->sup_date;
        $data['sup_price'] = $hosbital->sup_price;
        $data['suppay_price'] = $hosbital->suppay_price;
        $data['sup_time'] = $hosbital->sup_time;
        $data['sup_date'] = $hosbital->sup_date;
        $data['status'] = $hosbital->status;
        
       
        $pdf = PDF::loadView('admin.clinic.pdf',compact('clinic'));
      // return  $pdf->stream($venpharmice->id . '.pdf');
        return view('admin.clinic.pdf', compact('pdf','clinic'));
      }

      public function showdetail($id){
        $clinic = clinic::where('id',$id)->first();
        $serve2s = serve2::where('clinic_id',$clinic -> id)->get();
        $serve2_prices = serve2_price::where('clinic_id',$clinic -> id)->get();
        $serve2_thins = serve2_thin::where('clinic_id',$clinic -> id)->get();
        $users = User::get();
        $serve2_totals = serve2_total::where('clinic_id',$clinic -> id)->get();
        $serve2_tprices = serve2_tprice::where('clinic_id',$clinic -> id)->get();
        $serve1s = serve1::where('clinic_id',$clinic -> id)->get();
      $serve1_prices = serve1_price::where('clinic_id',$clinic -> id)->get();
      $serve1_thins = serve1_thin::where('clinic_id',$clinic -> id)->get();
      $serve1_totals = serve1_total::where('clinic_id',$clinic -> id)->get();
      $serve1_tprices = serve1_tprice::where('clinic_id',$clinic -> id)->get();
      $appoemint1s = appoemint1::where('clinic_id',$clinic -> id)->get();
      $appoemint2s = appoemint2::where('clinic_id',$clinic -> id)->get();
      $plases = plase::get();
    
        return view('admin.clinic.detail',compact('clinic','serve2s','serve2_prices','serve2_thins','users','serve2_totals','serve2_tprices','serve1s','serve1_prices','serve1_thins','serve1_totals','serve1_tprices','appoemint1s','appoemint2s','plases'));
    }
      
  
}
