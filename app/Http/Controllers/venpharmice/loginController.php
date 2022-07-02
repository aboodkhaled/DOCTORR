<?php

namespace App\Http\Controllers\venpharmice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PloginRequest;
use APP\model\venpharmice;
class loginController extends Controller
{
    public function getlogin(){
        return View('venpharmice.auth.login');
    }

    
    
    public function login(PloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('venpharmice')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('venpharmice.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('venpharmice.login');
    }

    private function getGaurd()
    {
        return auth('venpharmice');
    }
    
}
