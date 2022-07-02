<?php

namespace App\Http\Controllers\site;
use Spatie\Translatable\HasTranslations;

use App\Models\Category;
use App\Model\doctor;
use App\Model\department;
use App\Model\specialty;
use App\Model\hosbital;
use App\Model\fhosbital;
use App\Model\clinic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function index()
    {
        $data=[];
        $data['departments'] = department::orderBy('id')->get();
        $data['hosbitals'] = hosbital::orderBy('id')->get();
        $data['fhosbitals'] = fhosbital::orderBy('id')->get();
        $data['clinics'] = clinic::orderBy('id')->get();
        $data['doctors'] = doctor::orderBy('id')->with(['specialty' => function ($q) {
            $q->selection( 'id','special_name');
            
        },
        'department' => function ($o) {
            $o->select( 'id','dept_name');
        },
        'cuontry' => function ($u) {
            $u->select( 'id','name');
        },
        'city' => function ($i) {
            $i->select( 'id','name');
        }
        ])
        ->get();
        return view('front.home', $data);
    }
    public function mo()
    {
        $data=[];
        $data['departments'] = department::all('dept_name','id');
        $data['doctors'] = doctor::orderBy('id')->with(['specialty' => function ($q) {
            $q->selection( 'id','special_name');
            
        },
        'department' => function ($o) {
            $o->select( 'id','dept_name');
        },
        'cuontry' => function ($u) {
            $u->select( 'id','name');
        },
        'city' => function ($i) {
            $i->select( 'id','name');
        }
        ])
        ->get();
        return view('front.home', $data);
    }

    public function MarkAsRead_all(Request $request){
        $userunreadnotification = auth('')->user()->unreadNotifications;
        if($userunreadnotification){
            $userunreadnotification->markAsRead();
            return back();
        }

    }
}
