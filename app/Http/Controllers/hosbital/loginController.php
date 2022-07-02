<?php

namespace App\Http\Controllers\hosbital;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HloginRequest;
use APP\model\hosbital;
class loginController extends Controller
{
    public function getlogin(){
        return View('hosbital.auth.login');
    }

    
    
    public function login(HloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('hosbitall')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('hosbital.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('hosbital.login');
    }

    private function getGaurd()
    {
        return auth('hosbitall');
    }
    
}
