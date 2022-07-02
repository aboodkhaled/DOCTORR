<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\department;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\config;
use Illuminate\Support\Facades\Lang;
use DB;
use Session;
class DepartmentController extends Controller
{
    public function index(){
        
        $departments = department::orderBy('id')->paginate(PAGINATION_COUNT);
        
        return view('admin.department.index',compact('departments'));
    }
    public function setTarget(Request $request){
        Session::put('target',$request->target);
        return 1;
      }

    public function create(){
        return view('admin.department.create');
    }
     
    public function save(DepartmentRequest $request){
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
        $department = new department();
        $department->dept_name =$request->dept_name;
        $department->dept_des =  $request->dept_des;
        $department-> photo = $filepath;
        $department-> active = $request->active;
         $department->save();
         DB::commit();
         
        return redirect()->route('admin.departments')->with(['success' => trans('messages.success')]);

    }catch (\Exception $ex) { 

        DB::rollback();
        return redirect()->route('admin.departments')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
}

 public function edit($dept_id){
  $department =  department::find($dept_id);
  if(!$department)
  return redirect()->route('admin.departments')->with(['error' => 'هذا القسم غير موجود']);

   return view('admin.department.edit',compact('department'));

 }

 public function update($dep_id,DepartmentRequest $request){
     
    $department =  department::findOrFail($dep_id);
    if(!$department)
  return redirect()->route('admin.departments')->with(['error' => 'هذا القسم غير موجود']);
  DB::beginTransaction();
        
        if($request->has('photo')){
            $filepath = uploadImage('department', $request->photo);
            department::where('id', $dep_id)
            ->update([
            'photo' => $filepath,
            ]);
        }
        if(!$request -> has('active'))
            $request -> request->add(['active' => 1]);
            else
            $request -> request->add(['active' => 0]);
        
        $department -> update([
            $department->dept_name =  $request->dept_name,
        $department->dept_des =  $request->dept_des,
       
        $department-> active = $request->active,
        ]);

        DB::commit();
  return redirect()->route('admin.departments')->with(['success' => trans('messages.Update')]);

 }

 public function destroy($de_id){
    try{
        $department = department::find($de_id);
        if(!$department){
            return redirect() -> route('admin.departments',$de_id)-> with(['error'=>'هذة ألقسم غير موجودة']);
        }
        $department -> delete();
        return redirect()->route('admin.departments')->with(['success'=>trans('messages.Delete')]);
           }catch(\Exception $ex){
            return redirect()->route('admin.departments')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }

}
