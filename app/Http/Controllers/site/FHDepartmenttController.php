<?php

namespace App\Http\Controllers\Site;

use App\Model\fhosbital\fdepartment;
use App\Http\Controllers\Controller;
use App\Models\fhosbital\fdoctor;

class FHDepartmenttController extends Controller
{
    public function departmentpyid($id)
    {
        $data = [];
        $data['fdepartment'] = fdepartment::where('id',$id) -> first(); 
      
        if ($data['fdepartment'])
            $data['fdoctor'] = $data['fdepartment']->fdoctor;

       // return view('front.hdoctorr', $data);
    }

}
