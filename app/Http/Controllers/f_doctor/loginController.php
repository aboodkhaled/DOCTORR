<?php

namespace App\Http\Controllers\f_doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\fPloginRequest;
use APP\model\fhosbital\fdoctor;
use Auth;
class loginController extends Controller
{
    public function getlogin(){
        return View('f_doctor.auth.login');
    }

    
    
    public function login(fPloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('f_doctor')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم  الدخول بنجاح  ');
            return redirect()->route('f_doctor.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('f_doctor.login');
    }

    private function getGaurd()
    {
        return auth('f_doctor');
    }
    
}
