<?php

namespace App\Http\Controllers\fhosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HloginRequest;
use APP\model\fhosbital;
class loginController extends Controller
{
    public function getlogin(){
        return View('fhosbital.auth.login');
    }

    
    
    public function login(HloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('fhosbitall')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('fhosbital.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('fhosbital.login');
    }

    private function getGaurd()
    {
        return auth('fhosbitall');
    }
    
}
