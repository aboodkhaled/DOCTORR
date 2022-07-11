<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      
        if (Auth::guard($guard)->check()){
          if ($guard == 'admin')
                return redirect(RouteServiceProvider::ADMIN);
                if($guard == 'doctorr')
              return redirect(RouteServiceProvider::DOCTORR);
              if($guard == 'venlabe')
                return redirect(RouteServiceProvider::VENLABE);
                if($guard == 'venpharmice')
                return redirect(RouteServiceProvider::VENPHARMICE);
                if($guard == 'hosbitall')
                return redirect(RouteServiceProvider::HOSBITALL);
                if($guard == 'fhosbitall')
                return redirect(RouteServiceProvider::FHOSBITALL);
                if($guard == 'clinic')
                return redirect(RouteServiceProvider::CLINIC);

                if($guard == 'h_doctor')
              return redirect(RouteServiceProvider::H_DOCTOR);
              if($guard == 'f_doctor')
              return redirect(RouteServiceProvider::F_DOCTOR);
               else
               
          return redirect(RouteServiceProvider::HOME);}
          
                 return $next($request);
               
    }

    
}
