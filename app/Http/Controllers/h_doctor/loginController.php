<?php

namespace App\Http\Controllers\h_doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\hPloginRequest;
use APP\model\hosbital\hdoctor;
use Auth;
class loginController extends Controller
{
    public function getlogin(){
        return View('h_doctor.auth.login');
    }

    
    
    public function login(hPloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('h_doctor')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم  الدخول بنجاح  ');
            return redirect()->route('h_doctor.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('h_doctor.login');
    }

    private function getGaurd()
    {
        return auth('h_doctor');
    }
    
}
