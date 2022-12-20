<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VenlabeRequest;
use App\model\venlabe;
use  App\model\cuontry;
use  App\model\city;
use App\model\vnlabe_detail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
use DB;

class VenlabeController extends Controller
{
      /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
        $venlabe = venlabe::orderBy('id')->paginate(PAGINATION_COUNT); //use pagination here
       return view('admin.venlabe.index', compact('venlabe'));
   }

   public function create(){
    $cuontrys = cuontry::get();
    $citys = city::get();
       return view('admin.venlabe.create',compact('citys','cuontrys'));
   }


   public function store(VenlabeRequest $request) {
    try{
        DB::beginTransaction();

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
            $filepath = uploadImage('venlabe', $request->photo);}
           $venlabe = new venlabe();
           $venlabe->name =  $request->name;
           $venlabe->email = $request->email;
           $venlabe->photo = $filepath;
           $venlabe->password = bcrypt($request->password);  
           $venlabe->mobile = $request->mobile;
           $venlabe->active = $request->active;
           $venlabe->sup_date = $request->sup_date;
           $venlabe->sup_price = $request->sup_price;
           $venlabe->suppay_price = $request->suppay_price;
           $venlabe->pay_time = $request->pay_time;
           $venlabe->pay_date = $request->pay_date;
           $venlabe->status = $request->status;
           $venlabe->cuontry_id =$request->cuontry_id;
           $venlabe->city_id =$request->city_id;
           $venlabe->address =  $request->address;
           // the best place on model
          
    
           // save tzhe new user data
           $venlabe->save();
           $venlabe_id = venlabe::latest()->first()->id;
           vnlabe_detail::create([
            'venlabe_id' => $venlabe_id,
            'admin' => (auth::user()->name),
            'sup_price' => $request->sup_price,
           'suppay_price' => $request->suppay_price,
           'pay_time' => $request->pay_time,
           'pay_date' => $request->pay_date,
           ]);
           DB::commit();
            return redirect()->route('admin.venlabes.index')->with(['success' => trans('messages.success')]);
        }catch (\Exception $ex) { 

            DB::rollback();
            return redirect()->route('admin.venlabes.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
   }

   public function edit($vel_id){
    $venlabe =  venlabe::find($vel_id);
    if(!$venlabe)
    return redirect()->route('admin.venlabes.index')->with(['error' => 'هذا ألمختبر غير موجود']);
    $cuontrys = cuontry::get();
    $citys = city::get();
     return view('admin.venlabe.edit',compact('venlabe','citys','cuontrys'));
  
   }
  
   public function update($vel_id,VenlabeRequest $request){
       
      $venlabe =  venlabe::find($vel_id);
      if(!$venlabe)
    return redirect()->route('admin.venlabes.index')->with(['error' => 'هذا ألمختبر غير موجود']);
    DB::beginTransaction();
          
          if($request->has('photo')){
              $filepath = uploadImage('venlabe', $request->photo);
              venlabe::where('id', $vel_id)
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
             
          $venlabe -> update([ 
            $venlabe->name =  ['en' => $request->name_en, 'ar' => $request->name],
            $venlabe->email = $request->email,
            $venlabe->password = bcrypt($request->password),  
            $venlabe->mobile = $request->mobile,
            $venlabe->active = $request->active,
            $venlabe->sup_date = $request->sup_date,
            $venlabe->sup_price = $request->sup_price,
            $venlabe->suppay_price = $request->suppay_price,
            $venlabe->pay_time = $request->pay_time,
            $venlabe->pay_date = $request->pay_date,
            $venlabe->status = $request->status,
            $venlabe->cuontry_id =$request->cuontry_id,
            $venlabe->city_id =$request->city_id,
            $venlabe->address = ['en' => $request->address_en, 'ar' => $request->address],

          ]);
  
          DB::commit();
    return redirect()->route('admin.venlabes.index')->with(['success' => trans('messages.Update')]);
    
  
   }
  
   public function destroy($vl_id){
      try{
          $venlabe = venlabe::find($vl_id);
          if(!$venlabe){
              return redirect() -> route('admin.venlabes.index',$vl_id)-> with(['error'=>'هذة ألمختبر غير موجودة']);
          }
          $venlabe -> delete();
          return redirect()->route('admin.venlabes.index')->with(['success'=>trans('messages.Delete')]);
             }catch(\Exception $ex){
              return redirect()->route('admin.venlabes.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
              }    
  
      }

      public function getcity(Request $request ){
          
        $cities = city::whereCuontryId($request->cuontry_id)->pluck('name','id');
        return response()->json($cities);
    }
}
