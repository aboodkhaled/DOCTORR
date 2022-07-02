<?php

namespace App\Http\Controllers\venlabe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VloginRequest;
use APP\model\venlabe;
class loginController extends Controller
{
    public function getlogin(){
        return View('venlabe.auth.login');
    }

    
    
    public function login(VloginRequest $request){
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('venlabe')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
          //  notify()->success('تم الدخول بنجاح  ');
            return redirect()->route('venlabe.dashboard');
        }
             //  notify()->error('خطا في البيانات  برجاء المحاولة مجدا ');
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('venlabe.login');
    }

    private function getGaurd()
    {
        return auth('venlabe');
    }
    
}
