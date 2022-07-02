<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PloginRequest;
use APP\model\doctor;
use Auth;
class loginController extends Controller
{
    public function getlogin(){
        return View('doctor.auth.login');
    }

    
    
    public function login(PloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('doctorr')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم  الدخول بنجاح  ');
            return redirect()->route('doctor.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('doctorr.login');
    }

    private function getGaurd()
    {
        return auth('doctorr');
    }
    
}
