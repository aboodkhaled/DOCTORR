<?php

namespace App\Http\Controllers\hosbital;

use App\Http\Controllers\Controller;
use App\Http\Requests\HosbitalRequest;
use App\model\hosbital;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
use DB;

class HosbitalController extends Controller
{
     /**
    * render and paginate the users page.
    *
    * @return string
    */
    public function index() {
        $hosbital = hosbital::latest()->where('id', '<>', auth()->id())->get(); //use pagination here
       return view('admin.hosbital.index', compact('hosbital'));
   }

   public function create(){
      
       return view('admin.hosbital.create');
   }


   public function store(HosbitalRequest $request) {
    try{
    DB::beginTransaction();

    if(!$request->has('active'))
    $request->request->add(['active' => 0]);
    else
    $request->request->add(['active' => 1]);
    $filepath = "";
    if($request->has('photo')){
        $filepath = uploadImage('hosbital', $request->photo);}
       $hosbital = new hosbital();
       $hosbital->name = $request->name;
       $hosbital->email = $request->email;
       $hosbital-> photo = $filepath;
       $hosbital->password = bcrypt($request->password);  
       $hosbital->mobile = $request->mobile;
       $hosbital->active = $request->active;
       $hosbital-> sup_date = $request->sup_date;
       // the best place on model
      

       // save the new user data
       $hosbital->save();
       DB::commit();
            return redirect()->route('admin.hosbitals.index')->with(['success' => 'تم الحفظ بنجاح']);
        }catch (\Exception $ex) { 

            DB::rollback();
            return redirect()->route('admin.hosbitals.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
   }

   public function edit($hos_id){
    $hosbital =  hosbital::find($hos_id);
    if(!$hosbital)
    return redirect()->route('admin.hosbitals.index')->with(['error' => 'هذا ألمستشفئ غير موجود']);
  
     return view('admin.hosbital.edit',compact('hosbital'));
  
   }
  
   public function update($hos_id,HosbitalRequest $request){
       try{
      $hosbital =  hosbital::find($hos_id);
      if(!$hosbital)
    return redirect()->route('admin.hosbitals.index')->with(['error' => 'هذا ألمستشفئ غير موجود']);
    DB::beginTransaction();
          
          if($request->has('photo')){
              $filepath = uploadImage('hosbital', $request->photo);
              hosbital::where('id', $hos_id)
              ->update([
              'photo' => $filepath,
              ]);
          }
          if(!$request -> has('active'))
              $request -> request->add(['active' => 0]);
              else
              $request -> request->add(['active' => 1]);
          
          $hosbital -> update($request -> except('_token','id','photo'));
  
          DB::commit();
    return redirect()->route('admin.hosbitals.index')->with(['success' => 'تم التحديث بنجاح']);
  }catch(\Exception $ex){
      return redirect()->route('admin.hosbitals.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
  }
   }
  
   public function destroy($ho_id){
      try{
          $hosbital = hosbital::find($ho_id);
          if(!$hosbital){
              return redirect() -> route('admin.hosbitals.index',$ho_id)-> with(['error'=>'هذة ألمستشفئ غير موجودة']);
          }
          $hosbital -> delete();
          return redirect()->route('admin.hosbitals.index')->with(['success'=>'تم حذف ألمستشفئ بنجاح']);
             }catch(\Exception $ex){
              return redirect()->route('admin.hosbitals.index')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
              }    
  
      }
  
}
