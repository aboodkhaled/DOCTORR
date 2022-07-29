<?php

namespace App\Http\Controllers\Site;
use GuzzleHttp\Client;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\config;
use App\Http\Controllers\Controller;
use App\model\clinic\serve4;
use App\model\clinic\appoemint4;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4_total;
use App\model\transaction;
use App\User;
use App\model\clinic\serve4_thin;
use App\model\clinic\serve4_tprice;
use App\model\doctor_serve;
use App\model\clinic;
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

class Cappoemintt4Controller extends Controller
{
  private $HyperpayServices;
  public function __construct(HyperpayServices $HyperpayServices){
       $this->HyperpayServices = $HyperpayServices;
  }

  
    public function create($id)
    {
      
      $serve1s = serve4::active()->get();
      $serve1ss = serve4::find($id);
      $clinic = clinic::where('id',$serve1ss->clinic_id)->get();
      $serve1_prices = serve4_price::get();
      $serve1_thins = serve4_thin::get();
      $serve1_tprices = serve4_tprice::get();
      $serve1_totals = serve4_total::get();
     
      $users = User::get();
   //return $clinic;
      
        return view('front.cappoemint4',compact('serve1s','serve1ss','clinic','serve1_prices','serve1_thins','serve1_tprices','serve1_totals','users'));
    }

    public function save(Request $request){
      $appoemints = new appoemint4();
      $appoemints->user_id=$request->user_id;
      $appoemints->serve4_id=$request->serve4_id;
      $appoemints->serve4_price_id=$request->serve4_price_id;
      $appoemints->serve4_thin_id=$request->serve4_thin_id;
      $appoemints->serve4_total_id=$request->serve4_total_id;
      $appoemints->serve4_tprice_id=$request->serve4_tprice_id;
      $appoemints->date=$request->date;
      $appoemints->reson=$request->reson;
      $appoemints->clinic_id=$request->clinic_id;
      $appoemints->save();
      $admin = clinic::where('id',$appoemints -> clinic_id)->get();
      $appoemint4 = appoemint4::latest()->first();
      Notification::send($admin, new \App\Notifications\appoiment4($appoemint4));

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

    public function getpprice(Request $request ){
          
        $serve1_prices = serve4_price::whereServe4Id($request->serve4_id)->pluck('price','id');
        return response()->json($serve1_prices);
    }

    public function gettprice(Request $request ){
          
      $serve1_tprices = serve4_tprice::whereServe4Id($request->serve4_id)->pluck('thin_price','id');
      return response()->json($serve1_tprices);
  }

  public function gethprice(Request $request ){
          
    $serve1_thins = serve4_thin::whereServe4Id($request->serve4_id)->pluck('think','id');
    return response()->json($serve1_thins);
}

public function getoprice(Request $request ){
          
  $serve1_totals = serve4_total::whereServe4Id($request->serve4_id)->pluck('total','id');
  return response()->json($serve1_totals);
}
}
