<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\model\language;
use  App\Http\Requests\LanguageRequest;
use Illuminate\Support\Facades\Lang;
class LanguageController extends Controller
{
    public function index(){
      $languages =   language::select()-> paginate(PAGINATION_COUNT);
        return view('admin.language.index', compact('languages'));
    }

    public function create(){
       
          return view('admin.language.create');
      }

      public function save(LanguageRequest $request){
         try{
           
           language::create($request->except(['_token']));
         return redirect()->route('admin.languages')->with(['success'=>'تم حفظ اللغة بنجاح']);
         }catch(\Exception $ex){
         return redirect()->route('admin.languages')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
         }
      }

      public function edit($id){
        $language = language::select()->find($id);
        if(!$language){
            return redirect() -> route('admin.languages')-> with(['error'=>'هذة اللغة غير موجودة']);
        }    
        return view('admin.language.edit',compact('language'));
      }

      
      public function update($id,LanguageRequest $request){
          try{
        $language = language::find($id);
        if(!$language){
            return redirect() -> route('admin.languages.edit',$id)-> with(['error'=>'هذة اللغة غير موجودة']);
        }
        if(!$request -> has('active'));
        $request -> request->add(['active' => 1]);
        $language -> update($request -> except('_token'));
        return redirect()->route('admin.languages')->with(['success'=>'تم تعديل اللغة بنجاح']);
           }catch(\Exception $ex){
            return redirect()->route('admin.languages')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
            }    

    }
    public function destroy($id){
        try{
            $language = language::find($id);
            if(!$language){
                return redirect() -> route('admin.languages',$id)-> with(['error'=>'هذة اللغة غير موجودة']);
            }
            $language -> delete();
            return redirect()->route('admin.languages')->with(['success'=>'تم حذف اللغة بنجاح']);
               }catch(\Exception $ex){
                return redirect()->route('admin.languages')->with(['error'=>'هناك خطاء ما يرجى المحاولة فيما بعد']);        
                }    
    
        }
    
}
