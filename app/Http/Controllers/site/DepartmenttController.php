<?php

namespace App\Http\Controllers\Site;

use App\Model\department;
use App\Http\Controllers\Controller;
use App\Models\doctor;

class DepartmenttController extends Controller
{
    public function departmentpyid($id)
    {
        $data = [];
        $data['department'] = department::where('id',$id) -> first(); 
      
        if ($data['department'])
            $data['doctor'] = $data['department']->doctor;

        return view('front.doctorr', $data);
    }

}
