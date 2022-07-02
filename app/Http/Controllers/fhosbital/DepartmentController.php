<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\fhosbital\fdepartment;
use  App\model\fhosbital;
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
        $hosbital = fhosbital::find(auth('fhosbitall')->user()->id);
        $hdepartments = fdepartment::where('fhosbital_id',$hosbital -> id)->paginate(PAGINATION_COUNT);
        
        return view('fhosbital.department.index',compact('hosbital','hdepartments'));
    }
    public function setTarget(Request $request){
        Session::put('target',$request->target);
        return 1;
      }

    public function create(){
        return view('fhosbital.department.create');
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
        $hdepartment = new fdepartment();
        $hdepartment->dept_name = $request->dept_name;
        $hdepartment->dept_des = $request->dept_des;
        $hdepartment-> photo = $filepath;
        $hdepartment-> active = $request->active;
        $hdepartment->fhosbital_id=(auth::user('fhosbitall')->id);
        $hdepartment->save();
         DB::commit();
         
        return redirect()->route('fhosbital.departments')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('fhosbital.departments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($dept_id){
  $hdepartment =  fdepartment::find($dept_id);
  if(!$hdepartment)
  return redirect()->route('fhosbital.departments')->with(['error' => 'هذا القسم غير موجود']);

   return view('fhosbital.department.edit',compact('hdepartment'));

 }

 public function update($dep_id,HdepartmentRequest $request){
     
    $hdepartment =  fdepartment::findOrFail($dep_id);
    if(!$hdepartment)
  return redirect()->route('fhosbital.departments')->with(['error' => 'هذا القسم غير موجود']);
  DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('department', $request->photo);
            fdepartment::where('id', $dep_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 0]);
            else
            $request -> request->add(['active' => 1]);
        
        $hdepartment -> update([
            $hdepartment->dept_name =  $request->dept_name,
        $hdepartment->dept_des =  $request->dept_des,
       
        $hdepartment-> active = $request->active,
        ]);

        DB::commit();
  return redirect()->route('fhosbital.departments')->with(['success' => trans('messages.Update')]);

 }

 public function destroy($de_id){
    try{
        $hdepartment = fdepartment::find($de_id);
        if(!$hdepartment){
            return redirect() -> route('fhosbital.departments',$de_id)-> with(['error'=>'هذة ألقسم غير موجودة']);
        }
        $hdepartment -> delete();
        return redirect()->route('fhosbital.departments')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('fhosbital.departments')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }

}
