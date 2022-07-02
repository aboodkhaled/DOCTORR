<?php

namespace App\Http\Controllers\Api;
use Spatie\Translatable\HasTranslations;

use App\Models\Category;
use App\Model\doctor;
use App\Model\department;
use App\Model\specialty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;

class HomeController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $data=[];
        $data['departments'] = department::orderBy('id')->get();
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
        return response()->json($data);
    }
    public function mo()
    {
        //$data=[];
        
        $departments = department::orderBy('id')->get();
       // $data['doctors'] = doctor::orderBy('id')->with(['specialty' => function ($q) {
       //     $q->selection( 'id','special_name');
       //     
       // },
       // 'department' => function ($o) {
       //     $o->select( 'id','dept_name');
       // },
       // 'cuontry' => function ($u) {
         //   $u->select( 'id','name');
        //},
        //'city' => function ($i) {
          //  $i->select( 'id','name');
       // }
        //])
        //->get();
        //if(!$departments) 
       // return $this -> returnError('001','نا ةىتمنن');
       // return $this->returnData('departments', $departments);
        return response()->json($departments);
    }
}
