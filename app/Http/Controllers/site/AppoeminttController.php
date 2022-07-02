<?php

namespace App\Http\Controllers\Site;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\doctor;
use App\model\cuontry;
use App\model\appoemint;
use App\model\transaction;
use App\User;
use App\model\department;
use App\model\specialty;
use App\model\doctor_serve;
use App\model\serve;
use App\model\admin;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Events\Newappoemint;
use DB;
use App\Http\Services\HyperpayServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use PDF;
use App\model\operation;

class AppoeminttController extends Controller
{
  private $HyperpayServices;
  public function __construct(HyperpayServices $HyperpayServices){
       $this->HyperpayServices = $HyperpayServices;
  }

  
    public function create($id)
    {
      
      $departments = department::active()->get();
      $specialtys = specialty::active()->get();
      $doctors = doctor::find($id);
      $users = User::get();
      $doctor_serves = doctor_serve::get();
      $serves = serve::get();
        return view('front.appoemint',compact('departments','specialtys','doctors','users','doctor_serves','serves'));
    }

    public function save(Request $request){
     $appoemints = new appoemint();
     $appoemints->user_id=$request->user_id;
     $appoemints->doctor_id=$request->doctor_id;
     $appoemints->department_id=$request->department_id;
     $appoemints->specialty_id=$request->specialty_id;
     $appoemints->doctor_serve_id=$request->doctor_serve_id;
     $appoemints->serve_id=$request->serve_id;
     $appoemints->adate=$request->adate;
     $appoemints->reson=$request->reson;
     $appoemints->save();
     $admin = admin::get();
     $appoemint = appoemint::latest()->first();
     Notification::send($admin, new \App\Notifications\appoiment($appoemint));
   // event(new Newappoemint($appoemint));
    $CustomerCashPayCode=$request->CustomerCashPayCode;
    $CurrencyId=$request->CurrencyId;
    $SpId=$request->SpId;
    //return $CurrencyId;
   // $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   // $f=base64_encode(openssl_encrypt("NewYear@2","aes-256-cbc", "unrugefihputfzpjljqaoewcvcvpvmvo", OPENSSL_RAW_DATA, $iv));
    
    return $this->HyperpayServices->sendPayment($CustomerCashPayCode,$CurrencyId,$SpId); 
     
    
    //toastr()->success(trans('messages.success'));
   // return redirect()->back()->with(['success' => trans('messages.success')]);

}

public function confirm(){
  $transactions = transaction::latest()->first();
  
  return view('front.conf',compact('transactions'));
}
public function conf(Request $request){
  $cod = $request->cod;
  return $this->HyperpayServices->sendConf($cod); 
}

    public function getprice(Request $request ){
          
        $doctor_serves = doctor_serve::whereServeId($request->serve_id)->pluck('price','id');
        return response()->json($doctor_serves);
    }
}
