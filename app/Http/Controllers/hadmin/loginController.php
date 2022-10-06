<?php

namespace App\Http\Controllers\hadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LhoginRequest;
use APP\model\hadmin;
class loginController extends Controller
{
    public function getlogin(){
        return View('hadmin.auth.login');
    }

    
    
    public function login(LhoginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('hadmin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('hadmin.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('hadmin.login');
    }

    private function getGaurd()
    {
        return auth('hadmin');
    }
    
}
