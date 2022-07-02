<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\VenlabeRequest;
use App\Model\venlabe;
use App\Model\vnlabe_detail;
use  App\model\cuontry;
use  App\model\city;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\User;
use Hash;
use Auth;
use App\Image;
class VnlabeDetailController extends Controller
{
    public function showdetail($id){
        $venlabe = venlabe::where('id',$id)->first();
        $detail = vnlabe_detail::where('venlabe_id',$id)->get();
        return view('admin.venlabe.detail',compact('venlabe','detail'));
    }
}
