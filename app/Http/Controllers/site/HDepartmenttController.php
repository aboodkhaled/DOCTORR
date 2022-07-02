<?php

namespace App\Http\Controllers\Site;

use App\Model\hosbital\hdepartment;
use App\Http\Controllers\Controller;
use App\Models\hosbital\hdoctor;

class HDepartmenttController extends Controller
{
    public function departmentpyid($id)
    {
        $data = [];
        $data['hdepartment'] = hdepartment::where('id',$id) -> first(); 
      
        if ($data['hdepartment'])
            $data['hdoctor'] = $data['hdepartment']->hdoctor;

        return view('front.hdoctorr', $data);
    }

}
