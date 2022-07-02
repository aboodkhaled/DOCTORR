<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\hosbital\hdepartment;
use  App\model\hosbital;
use App\Http\Requests\HdepartmentRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;
use Hash;
use Auth;
use App\Image;
use PDF;
class DepartmentController extends Controller
{
    public function index(){
        $hosbital = hosbital::find(auth('hosbitall')->user()->id);
        $hdepartments = hdepartment::where('hosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        
        return view('hosbital.department.index',compact('hosbital','hdepartments'));
    }
    public function setTarget(Request $request){
        Session::put('target',$request->target);
        return 1;
      }

    public function create(){
        return view('hosbital.department.create');
    }
     
    public function save(HdepartmentRequest $request){
        try{
        DB::beginTransaction();

        if(!$request->has('active'))
        $request->request->add(['active' => 0]);
        else
        $request->request->add(['active' => 1]);
        $filepath = "";
        if($request->has('photo')){
            $filepath = uploadImage('department', $request->photo);
            
        }
        $hdepartment = new hdepartment();
        $hdepartment->dept_name = ['en' => $request->dept_name_en, 'ar' => $request->dept_name];
        $hdepartment->dept_des = ['en' => $request->dept_des_en, 'ar' => $request->dept_des];
        $hdepartment-> photo = $filepath;
        $hdepartment-> active = $request->active;
        $hdepartment->hosbital_id=(auth::user('hosbitall')->id);
        $hdepartment->save();
         DB::commit();
         
        return redirect()->route('hosbital.departments')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('hosbital.departments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($dept_id){
  $hdepartment =  hdepartment::find($dept_id);
  if(!$hdepartment)
  return redirect()->route('hosbital.departments')->with(['error' => 'هذا القسم غير موجود']);

   return view('hosbital.department.edit',compact('hdepartment'));

 }

 public function update($dep_id,HdepartmentRequest $request){
     
    $hdepartment =  hdepartment::findOrFail($dep_id);
    if(!$hdepartment)
  return redirect()->route('hosbital.departments')->with(['error' => 'هذا القسم غير موجود']);
  DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('department', $request->photo);
            hdepartment::where('id', $dep_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $hdepartment -> update([
            $hdepartment->dept_name = ['en' => $request->dept_name_en, 'ar' => $request->dept_name],
        $hdepartment->dept_des = ['en' => $request->dept_des_en, 'ar' => $request->dept_des],
       
        $hdepartment-> active = $request->active,
        ]);

        DB::commit();
  return redirect()->route('hosbital.departments')->with(['success' => trans('messages.Update')]);

 }

 public function destroy($de_id){
    try{
        $hdepartment = hdepartment::find($de_id);
        if(!$hdepartment){
            return redirect() -> route('hosbital.departments',$de_id)-> with(['error'=>'هذة ألقسم غير موجودة']);
        }
        $hdepartment -> delete();
        return redirect()->route('hosbital.departments')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('hosbital.departments')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }

}
