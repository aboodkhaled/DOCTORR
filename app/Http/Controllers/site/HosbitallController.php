<?php

namespace App\Http\Controllers\Site;

use App\Model\hosbital;
use App\Http\Controllers\Controller;
use App\Models\doctor;

class HosbitallController extends Controller
{
    public function hosbitalpyid($id)
    {
        $data = [];
        $data['hosbital'] = hosbital::where('id',$id) -> first(); 
      
       // if ($data['hosbital'])
         //   $data['doctor'] = $data['department']->doctor;

      //  return view('front.doctorr', $data);
    }

}
