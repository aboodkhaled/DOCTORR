<?php

namespace App\Http\Controllers\Site;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hcuontry;
use App\model\hosbital\happoemint;
use App\model\transaction;
use App\User;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hserve;
use App\model\hosbital;
use App\model\clinic;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Notification;
use App\Events\Newappoemint;
use DB;
use App\Http\Services\HyperpayServices_in;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Image;
use PDF;
use App\model\hosbital\hoperation;

class HappoeminttController extends Controller
{
  private $HyperpayServices_in;
  public function __construct(HyperpayServices_in $HyperpayServices_in){
       $this->HyperpayServices_in = $HyperpayServices_in;
  }

  
    public function create($id)
    {
      
      $departments = hdepartment::active()->get();
      $specialtys = hspecialty::active()->get();
      $doctors = hdoctor::find($id);
      $hosbital = hosbital::where('id',$doctors -> hosbital_id)->get();
      $users = User::find(auth()->user()->id);
      $doctor_serves = hdoctor_serve::get();
      $serves = hserve::get();
     //  $hosbital;
        return view('front.happoemint',compact('departments','specialtys','doctors','hosbital','users','doctor_serves','serves'));
    }

    public function save(Request $request){
      
     $appoemints = new happoemint();
     $appoemints->user_id=$request->user_id;
     $appoemints->hdoctor_id=$request->hdoctor_id;
     $appoemints->hdepartment_id=$request->hdepartment_id;
     $appoemints->hspecialty_id=$request->hspecialty_id;
     $appoemints->hdoctor_serve_id=$request->hdoctor_serve_id;
     $appoemints->hserve_id=$request->hserve_id;
     $appoemints->adate=$request->adate;
     $appoemints->reson=$request->reson;
     $appoemints->hosbital_id=$request->hosbital_id;
     $appoemints->save();
     $admin = hosbital::where('id',$appoemints -> hosbital_id)->get();
    
     $happoemint = happoemint::latest()->first();
     Notification::send($admin, new \App\Notifications\happoiment($happoemint));
    // event(new Newappoemint($appoemint));
    $hdoctor = hdoctor::where('id',$appoemints -> hdoctor_id)->get();
    Notification::send($hdoctor, new \App\Notifications\hhappoiment($happoemint));
    
    $CustomerCashPayCode=$request->CustomerCashPayCode;
    $CurrencyId=$request->CurrencyId;
    $SpId=$request->SpId;
    //return $CurrencyId;
   // $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
   // $f=base64_encode(openssl_encrypt("NewYear@2","aes-256-cbc", "unrugefihputfzpjljqaoewcvcvpvmvo", OPENSSL_RAW_DATA, $iv));
    
    return $this->HyperpayServices_in->sendPayment($CustomerCashPayCode,$CurrencyId,$SpId); 
     
    
    //toastr()->success(trans('messages.success'));
   // return redirect()->back()->with(['success' => trans('messages.success')]);

}

public function confirm(){
  $transactions = transaction::latest()->first();
  
  return view('front.conf',compact('transactions'));
}
public function conf(Request $request){
  $cod = $request->cod;
  return $this->HyperpayServices_in->sendConf($cod); 
}

    public function hgetprice(Request $request ){
          
        $doctor_serves = hdoctor_serve::whereHserveId($request->hserve_id)->pluck('price','id');
        return response()->json($doctor_serves);
    }
}
