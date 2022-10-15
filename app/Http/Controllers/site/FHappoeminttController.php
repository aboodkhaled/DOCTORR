<?php

namespace App\Http\Controllers\Site;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fappoemint;
use App\model\transaction;
use App\User;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fserve;
use App\model\fhosbital;
use App\model\clinic;
use App\model\hadmin;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Events\Newappoemint;
use DB;
use App\Http\Services\HyperpayServices_aut;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use PDF;
use App\model\fhosbital\foperation;

class FHappoeminttController extends Controller
{
  private $HyperpayServices_aut;
  public function __construct(HyperpayServices_aut $HyperpayServices_aut){
       $this->HyperpayServices_aut = $HyperpayServices_aut;
  }

  
    public function create($id)
    {
      
      $departments = fdepartment::active()->get();
      $specialtys = fspecialty::active()->get();
      $doctors = fdoctor::find($id);
      $hosbital = fhosbital::where('id',$doctors -> fhosbital_id)->get();
      $users = User::find(auth()->user()->id);
      $hadmin = hadmin::where('id',$doctors -> fhosbital-> hadmin_id)->get();
      $doctor_serves = fdoctor_serve::get();
      $serves = fserve::get();
  // return $hadmin;
        return view('front.fappoemint',compact('departments','specialtys','doctors','hosbital','users','hadmin','doctor_serves','serves'));
    }

    public function save(Request $request){
      
     $appoemints = new fappoemint();
     $appoemints->user_id=$request->user_id;
     $appoemints->fdoctor_id=$request->fdoctor_id;
     $appoemints->fdepartment_id=$request->fdepartment_id;
     $appoemints->fspecialty_id=$request->fspecialty_id;
     $appoemints->fdoctor_serve_id=$request->fdoctor_serve_id;
     $appoemints->fserve_id=$request->fserve_id;
     $appoemints->adate=$request->adate;
     $appoemints->reson=$request->reson;
     $appoemints->fhosbital_id=$request->fhosbital_id;
     $appoemints->hadmin_id=$request->hadmin_id;
     $appoemints->save();
     $admin = fhosbital::where('id',$appoemints -> fhosbital_id)->get();
    
     $fappoemint = fappoemint::latest()->first();
     Notification::send($admin, new \App\Notifications\fappoiment($fappoemint));
    // event(new Newappoemint($appoemint));
    $fdoctor = fdoctor::where('id',$appoemints -> fdoctor_id)->get();
    Notification::send($fdoctor, new \App\Notifications\fhappoiment($fappoemint));

    $hadminn = hadmin::where('id',$appoemints -> hadmin_id)->get();
    Notification::send($hadminn, new \App\Notifications\hadminn($fappoemint));
    
    $CustomerCashPayCode=$request->CustomerCashPayCode;
    $CurrencyId=$request->CurrencyId;
    $SpId=$request->SpId;
    //return $CurrencyId;
   // $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   // $f=base64_encode(openssl_encrypt("NewYear@2","aes-256-cbc", "unrugefihputfzpjljqaoewcvcvpvmvo", OPENSSL_RAW_DATA, $iv));
    
    return $this->HyperpayServices_aut->sendPayment($CustomerCashPayCode,$CurrencyId,$SpId); 
     
    
    //toastr()->success(trans('messages.success'));
   // return redirect()->back()->with(['success' => trans('messages.success')]);

}

public function confirm(){
  $transactions = transaction::latest()->first();
  
  return view('front.conf',compact('transactions'));
}
public function conf(Request $request){
  $cod = $request->cod;
  return $this->HyperpayServices_aut->sendConf($cod); 
}

    public function fgetprice(Request $request ){
          
        $fdoctor_serves = fdoctor_serve::whereFserveId($request->fserve_id)->pluck('price','id');
        return response()->json($fdoctor_serves);
    }
}
