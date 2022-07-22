<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()){
        if (Request::is(app()->getLocale().'/admin*'))
                return route('admin.login');
                if (Request::is(app()->getLocale().'/doctorr*'))
                return route('doctorr.login');
            
                if (Request::is(app()->getLocale().'/venlabe*'))
                return route('venlabe.login');
            
                if (Request::is(app()->getLocale().'/venpharmice*'))
                return route('venpharmice.login');
                
                if (Request::is(app()->getLocale().'/hosbitall*'))
                return route('hosbital.login');

                if (Request::is(app()->getLocale().'/fhosbitall*'))
                return route('fhosbital.login');


                if (Request::is(app()->getLocale().'/clinic*'))
                return route('clinic.login');

                if (Request::is(app()->getLocale().'/h_doctor*'))
                return route('h_doctor.login');
                if (Request::is(app()->getLocale().'/f_doctor*'))
                return route('f_doctor.login');
                
             else 
        
            
        return route('homee');}
               
       
        
    }
}
