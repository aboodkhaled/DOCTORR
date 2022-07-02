<?php

namespace App\Http\Controllers\clinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CloginRequest;
use APP\model\clinic;
class loginController extends Controller
{
    public function getlogin(){
        return View('clinic.auth.login');
    }

    
    
    public function login(CloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('clinic')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('clinic.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('clinic.login');
    }

    private function getGaurd()
    {
        return auth('clinic');
    }
    
}
