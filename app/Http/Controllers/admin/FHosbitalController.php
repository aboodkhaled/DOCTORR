<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FHosbitalRequest;
use App\model\fhosbital;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
use DB;
use Spatie\Translatable\HasTranslations;

use App\Http\Requests\VenpharmiceRequest;
use App\model\venpharmice;
use App\model\vnpharmice_detail;
use  App\model\cuontry;
use  App\model\city;



use PDF;

class FHosbitalController extends Controller
{
     /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
      $hosbital = fhosbital::orderBy('id')->paginate(PAGINATION_COUNT); //use pagination here
       // $hosbitals = hosbital::orderBy('id')->paginate(PAGINATION_COUNT); //use pagination here
       //return $hosbitals;
       return view('admin.fhosbital.index', compact('hosbital'));
   }

   public function create(){
    $cuontrys = cuontry::get();
    $citys = city::get();
       return view('admin.fhosbital.create',compact('citys','cuontrys'));
   }


   public function store(FHosbitalRequest $request) {
    
  

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
        $filepath = uploadImage('fhosbital', $request->photo);}
       $hosbitals = new fhosbital();
       $hosbitals->name =  $request->name;
       $hosbitals->email = $request->email;
       $hosbitals->photo = $filepath;
       $hosbitals->password = bcrypt($request->password);  
       $hosbitals->mobile = $request->mobile;
       $hosbitals->active = $request->active;
       $hosbitals->sup_date = $request->sup_date;
       $hosbitals->sup_price = $request->sup_price;
       $hosbitals->suppay_price = $request->suppay_price;
       $hosbitals->pay_time = $request->pay_time;
       $hosbitals->pay_date = $request->pay_date;
       $hosbitals->status = $request->status;
       $hosbitals->cuontry_id =$request->cuontry_id;
       $hosbitals->city_id =$request->city_id;
       $hosbitals->address = $request->address;
       $hosbitals->des =$request->des;
       // the best place on model
      

       // save tzhe new user data
       $hosbitals->save();
       //$venpharmice_id = venpharmice::latest()->first()->id;
       //vnpharmice_detail::create([
      //  'venpharmice_id' => $venpharmice_id,
      //  'admin' => (auth::user()->name),
      //  'sup_price' => $request->sup_price,
       //'suppay_price' => $request->suppay_price,
       //'pay_time' => $request->pay_time,
       //'pay_date' => $request->pay_date,
       //]);
      
     
            return redirect()->route('admin.fhosbitals.index')->with(['success' => trans('messages.success')]);
        
   }

   public function edit($vp_id){
    $hosbital =  fhosbital::find($vp_id);
    if(!$hosbital)
    return redirect()->route('admin.fhosbitals.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    $cuontrys = cuontry::get();
    $citys = city::get();
     return view('admin.fhosbital.edit',compact('hosbital','citys','cuontrys'));
  
   }
  
   public function update($vp_id,FHosbitalRequest $request){
       
      $hosbital =  fhosbital::find($vp_id);
      if(!$hosbital)
    return redirect()->route('admin.fhosbitals.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    DB::beginTransaction();
          
          if($request->has('photo')){
              $filepath = uploadImage('fhosbital', $request->photo);
              fhosbital::where('id', $vp_id)
              ->update([
              'photo' => $filepath,
              ]);
          }
          if(!$request -> has('active'))
              $request -> request->add(['active' => 0]);
              else
              $request -> request->add(['active' => 1]);
              if(!$request->has('status'))
    $request->request->add(['status' => 1]);
    else
    $request->request->add(['status' => 0]);
          
          $hosbital -> update([ 
            $hosbital->name =  $request->name,
            $hosbital->email = $request->email,
         
            $hosbital->password = bcrypt($request->password),  
            $hosbital->mobile = $request->mobile,
            $hosbital->active = $request->active,
            $hosbital->sup_date = $request->sup_date,
            $hosbital->sup_price = $request->sup_price,
            $hosbital->suppay_price = $request->suppay_price,
            $hosbital->pay_time = $request->pay_time,
            $hosbital->pay_date = $request->pay_date,
            $hosbital->status = $request->status,
            $hosbital->cuontry_id =$request->cuontry_id,
            $hosbital->city_id =$request->city_id,
            $hosbital->address =$request->address,
            $hosbital->des = $request->des,
          ]);
      
  
          DB::commit();
    return redirect()->route('admin.fhosbitals.index')->with(['success' => trans('messages.Update')]);
  
   }
  
   public function destroy($v_id){
      try{
          $hosbital = fhosbital::find($v_id);
          if(!$hosbital){
              return redirect() -> route('admin.fhosbitals.index',$v_id)-> with(['error'=>'هذة ألصيدلية غير موجودة']);
          }
          $hosbital -> delete();
          return redirect()->route('admin.fhosbitals.index')->with(['success'=>trans('messages.Delete')]);
             }catch(\Exception $ex){
              return redirect()->route('admin.fhosbitals.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
              }    
  
      }

      public function getcity(Request $request ){
          
          $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
          return response()->json($cities);
      }

      public function print($p_id){
        $hosbital = fhosbital::where('id',$p_id)->first();
        return view('admin.fhosbital.print', compact('hosbital'));
      }
      public function pdf($p_id){
        $hosbital = fhosbital::find($p_id);
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
        
       
        $pdf = PDF::loadView('admin.fhosbital.pdf',compact('hosbital'));
      // return  $pdf->stream($venpharmice->id . '.pdf');
        return view('admin.fhosbital.pdf', compact('pdf','hosbital'));
      }

      public function showdetail($id){
        $hosbital = fhosbital::where('id',$id)->first();
      //  $detail = vnpharmice_detail::where('venpharmice_id',$id)->get();
        return view('admin.fhosbital.detail',compact('hosbital'));
    }
      
  
}
