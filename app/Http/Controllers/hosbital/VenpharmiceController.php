<?php

namespace App\Http\Controllers\hosbital;
use Spatie\Translatable\HasTranslations;
use App\Http\Controllers\Controller;
use App\Http\Requests\VenpharmiceRequest;
use App\model\venpharmice;
use App\model\vnpharmice_detail;
use  App\model\cuontry;
use  App\model\city;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
use PDF;

class VenpharmiceController extends Controller
{
    /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
        $venpharmices = venpharmice::orderBy('id')->paginate(PAGINATION_COUNT); //use pagination here
       return view('admin.venpharmice.index', compact('venpharmices'));
   }

   public function create(){
    $cuontrys = cuontry::get();
    $citys = city::get();
       return view('admin.venpharmice.create',compact('citys','cuontrys'));
   }


   public function store(VenpharmiceRequest $request) {
    
  

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
        $filepath = uploadImage('venpharmice', $request->photo);}
       $venpharmices = new venpharmice();
       $venpharmices->name = $request->name;
       $venpharmices->email = $request->email;
       $venpharmices->photo = $filepath;
       $venpharmices->password = bcrypt($request->password);  
       $venpharmices->mobile = $request->mobile;
       $venpharmices->active = $request->active;
       $venpharmices->sup_date = $request->sup_date;
       $venpharmices->sup_price = $request->sup_price;
       $venpharmices->suppay_price = $request->suppay_price;
       $venpharmices->pay_time = $request->pay_time;
       $venpharmices->pay_date = $request->pay_date;
       $venpharmices->status = $request->status;
       $venpharmices->cuontry_id =$request->cuontry_id;
       $venpharmices->city_id =$request->city_id;
       $venpharmices->address = $request->address;
       // the best place on model
      

       // save tzhe new user data
       $venpharmices->save();
       $venpharmice_id = venpharmice::latest()->first()->id;
       vnpharmice_detail::create([
        'venpharmice_id' => $venpharmice_id,
        'admin' => (auth::user()->name),
        'sup_price' => $request->sup_price,
       'suppay_price' => $request->suppay_price,
       'pay_time' => $request->pay_time,
       'pay_date' => $request->pay_date,
       ]);
      
     
            return redirect()->route('admin.venpharmices.index')->with(['success' => trans('messages.success')]);
        
   }

   public function edit($vp_id){
    $venpharmice =  venpharmice::find($vp_id);
    if(!$venpharmice)
    return redirect()->route('admin.venpharmices.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    $cuontrys = cuontry::get();
    $citys = city::get();
     return view('admin.venpharmice.edit',compact('venpharmice','citys','cuontrys'));
  
   }
  
   public function update($vp_id,VenpharmiceRequest $request){
       
      $venpharmice =  venpharmice::find($vp_id);
      if(!$venpharmice)
    return redirect()->route('admin.venpharmices.index')->with(['error' => 'هذا ألصيدلية غير موجود']);
    DB::beginTransaction();
          
          if($request->has('photo')){
              $filepath = uploadImage('venpharmice', $request->photo);
              venpharmice::where('id', $vp_id)
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
          
          $venpharmice -> update([ 
            $venpharmice->name =  $request->name,
            $venpharmice->email = $request->email,
         
            $venpharmice->password = bcrypt($request->password),  
            $venpharmice->mobile = $request->mobile,
            $venpharmice->active = $request->active,
            $venpharmice->sup_date = $request->sup_date,
            $venpharmice->sup_price = $request->sup_price,
            $venpharmice->suppay_price = $request->suppay_price,
            $venpharmice->pay_time = $request->pay_time,
            $venpharmice->pay_date = $request->pay_date,
            $venpharmice->status = $request->status,
            $venpharmice->cuontry_id =$request->cuontry_id,
            $venpharmice->city_id =$request->city_id,
            $venpharmice->address = $request->address,
          ]);
      
  
          DB::commit();
    return redirect()->route('admin.venpharmices.index')->with(['success' => trans('messages.Update')]);
  
   }
  
   public function destroy($v_id){
      try{
          $venpharmice = venpharmice::find($v_id);
          if(!$venpharmice){
              return redirect() -> route('admin.venpharmices.index',$v_id)-> with(['error'=>'هذة ألصيدلية غير موجودة']);
          }
          $venpharmice -> delete();
          return redirect()->route('admin.venpharmices.index')->with(['success'=>trans('messages.Delete')]);
             }catch(\Exception $ex){
              return redirect()->route('admin.venpharmices.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
              }    
  
      }

      public function getcity(Request $request ){
          
          $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
          return response()->json($cities);
      }

      public function print($p_id){
        $venpharmice = venpharmice::where('id',$p_id)->first();
        return view('admin.venpharmice.print', compact('venpharmice'));
      }
      public function pdf($p_id){
        $venpharmice = venpharmice::find($p_id);
        $data['venpharmice_id'] = $venpharmice->id;
        $data['name'] = $venpharmice->name;
        $data['cuontry_id'] = $venpharmice->cuontry->name;
        $data['city_id'] = $venpharmice->city->name;
        $data['address'] = $venpharmice->address;
        $data['mobile'] = $venpharmice->mobile;
        $data['sup_date'] = $venpharmice->sup_date;
        $data['sup_price'] = $venpharmice->sup_price;
        $data['suppay_price'] = $venpharmice->suppay_price;
        $data['sup_time'] = $venpharmice->sup_time;
        $data['sup_date'] = $venpharmice->sup_date;
        $data['status'] = $venpharmice->status;
        
       
        $pdf = PDF::loadView('admin.venpharmice.pdf',compact('venpharmice'));
      // return  $pdf->stream($venpharmice->id . '.pdf');
        return view('admin.venpharmice.pdf', compact('pdf','venpharmice'));
      }
      
}
