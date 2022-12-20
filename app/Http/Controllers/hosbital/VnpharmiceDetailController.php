<?php

namespace App\Http\Controllers\hosbital;
use App\Http\Controllers\Controller;
use App\Http\Requests\VenpharmiceRequest;
use App\model\venpharmice;
use App\model\vnpharmice_detail;
use  App\model\cuontry;
use  App\model\city;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Hash;

use App\Image;
class VnpharmiceDetailController extends Controller
{
    public function showdetail($id){
        $venpharmice = venpharmice::where('id',$id)->first();
        $detail = vnpharmice_detail::where('venpharmice_id',$id)->get();
        return view('admin.venpharmice.detail',compact('venpharmice','detail'));
    }
}
