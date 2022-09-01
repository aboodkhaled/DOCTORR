<?php

namespace App\Http\Services;
//use App\model\doctor_serve;
//use App\model\appoemint;
use App\model\transaction;
use App\model\tax;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
//use Illuminate\Http\Request;
use App\Http\Controllers\Site\AppoeminttController;
use Illuminate\Database\Eloquent\Model;
//use App\model\doctor;
use App\model\operation;
use Illuminate\Support\Facades\Validator;


use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fappoemint;

use App\User;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fserve;
use App\model\fhosbital;
use App\model\clinic;

class HyperpayServices_aut
{
   private $base_url;
   private $headers;
   private $request_client;
   private $fappoemint;
   private $timestamp;
   private $cert;
   private $pass;
   private $curl;
    /**
     *  HyperpayServices constructor. 
     * @param Client $request_client
     *
     * 
     * 
     */
   
    public function __construct(Client $request_client, fappoemint $fappoemint)
    {
      $this -> fappoemint = $fappoemint;
      $this->timestamp = round(microtime(true) * 1000);
      $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $this->request_client = $request_client;
        $this->base_url = env('cash_base_url');
        $this->pass = env('YOUR_CERTIFICATE_PASSWORD');
        $this->cert = storage_path('app\cert\Besat-Alriah.pfx') ;
        $this->curl= [CURLOPT_SSLCERTTYPE=>'P12'];
        $this->headers = [
            'unixtimestamp'=>$this->timestamp ,
            'encPassword'=>base64_encode(openssl_encrypt("NewYear@2","aes-256-cbc", "7enzdkfspehg93hmo05hq4n8xjm85yba", OPENSSL_RAW_DATA, $iv)),
            'Content-Type: application/json',
           
            ];
      
    }

    /**
     *  
     * @param $uri
     * @param $method
     * @param array $data
     * @param false|mixed
     * @param \GuzzleHttp\Exception\GuzzleException
     * @param Request $request
     */

   private function buildRequest( $uri, $method,$CustomerCashPayCode,$CurrencyId,$SpId, $data = []){
    $fappoemint = fappoemint::latest()->first();
    //return $SpId;
    $timestamp = round(microtime(true) * 1000);
    $UserName="besatalreeh.platform";
    $SpId= 9693271578666158;
    $K= md5($SpId . $UserName . $this->timestamp );


    $data = [
      'RequestID'=>  rand(),
      'UserName'=> 'besatalreeh.platform',
      'SpId'=> "9693271578666158",
      'MDToken'=>$K,
      'TargetMSISDN'=> 775766315,
      'CustomerCashPayCode'=> 555,
      'Amount'=>$fappoemint->fdoctor_serve->price,
      'CurrencyId'=> $CurrencyId,
      'Desc'=> 'aaaaaaaaaaaaad'];
   //return $this->cert;

   // return ['cert'=>$this->cert,'curl'=>$this->curl];

       // return  ['cert'=>$this->cert,'curl'=>$this->curl];
    //   return $data;

     //return $this->cert;
      // return [$request ,['cert'=>$this->cert,'curl'=>$this->curl],[
       // 'json' => $data] ] ;
       
      // return  [
        //'json' => $data ,
        //'headers' => $this->headers,
        //'cert' => [$this->cert, $this->pass],
       // 'curl' => [CURLOPT_SSLCERTTYPE => 'P12'], // Define it's a PFX key
      // ];

    
         
       $request = new Request( $method, $this->base_url . $uri);
      
       if(!$data)
       return false;
       $response = $this->request_client->send($request ,  [
        'json' => $data ,
        'headers' => $this->headers,
        'cert' => [$this->cert, $this->pass],
        'curl' => [CURLOPT_SSLCERTTYPE => 'P12'], // Define it's a PFX key
    ]);
      //return $request;
  
      if ($response->getStatusCode() != 200){
          return false;
      }
       $response = json_decode($response->getBody(), true);
      
       $TransactionRef = $response["TransactionRef"];
       $RequestId = $response["RequestId"];
       $ResultCode = $response["ResultCode"];
      // return $TransactionRef;
     
       transaction::create([
        'appoemint_id' => $fappoemint->id,
        'transaction_id' => $TransactionRef, ]);
    return redirect()->route('appoemints.confirm');
      // return $response;
      
   }

   /**
     *  
     * @param $uri
     * @param $method
     * @param array $data
     * @param false|mixed
     * @param \GuzzleHttp\Exception\GuzzleException
     */

    private function buildcRequest( $uri, $method,$cod, $data = []){
      $transactions = transaction::latest()->first();
      $fappoemint = fappoemint::latest()->first();
      
      $timestamp = round(microtime(true) * 1000);
      $UserName="besat.pay";
      $SpId= 9988554516577278;
      $Kk= md5($SpId . $UserName . $this->timestamp );
      $a=$cod;
      $dataa = [
            'RequestID'=>  rand(),
            'UserName'=> 'besat.pay',
            'SpId'=> "9988554516577278",
            'MDToken'=>$Kk,
            'TransactionRef'=> $transactions->transaction_id,
            'TRCode'=> md5($transactions->transaction_id . $a),];
     $request = new Request( $method, $this->base_url . $uri,
     ['unixtimestamp'=>$this->timestamp ,
     'Content-Type: application/json']);
        
         if(!$dataa)
         return false;
         $responsee = $this->request_client->send($request, [
          'json' =>$dataa]);
     
        if ($responsee->getStatusCode() != 200){
            return false;
        }
         $responsee = json_decode($responsee->getBody(), true);
         $RequestIdd = $responsee["RequestId"];
         //return $RequestIdd;
         //return $responsee; 
         
         $fdoctors = fdoctor::where('id',$fappoemint->fdoctor_id)->get();
      $ivv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
      $UserNamee="besat.pay";
      $SpIdd= 9988554516577278;
      $Kk= md5($SpIdd . $UserNamee . $this->timestamp );
      
      $dataaa = [
            'RequestID'=>  rand(),
            'UserName'=> 'besat.pay',
            'SpId'=> "9988554516577278",
            'MDToken'=>$Kk,
            'RequestIDOfNeededOperation'=> $RequestIdd,
            'Type'=> 'PayOP',];
     $requestt = new Request( 'POST', $this->base_url .'/CashPay/api/Operation/OperationStatus',
     ['unixtimestamp'=>$this->timestamp ,
     'encPassword'=>base64_encode(openssl_encrypt("NewYear@2","aes-256-cbc", "unrugefihputfzpjljqaoewcvcvpvmvo", OPENSSL_RAW_DATA, $ivv)),
     'Content-Type: application/json']);
        
         if(!$dataaa)
         return false;
         $responseee = $this->request_client->send($requestt, [
          'json' =>$dataaa]);
     
        if ($responseee->getStatusCode() != 200){
            return false;
        }
         $responseee = json_decode($responseee->getBody(), true);
         $Status = $responseee["Status"];
         $RequestIddd = $responseee["RequestId"];
         $ResultCodee = $responseee["ResultCode"];
         operation::create([
          'user_id' => $fappoemint->user->id,
          'appoemint_id' => $fappoemint->id,
          'status' => $Status,
          'confirm_id' => $RequestIdd,
          'operation_id' => $RequestIddd,
          'active' => $ResultCodee, ]);
        // return $Status;
        // return $responseee; 

         toastr()->success(trans('messages.success'));
         return redirect()->route('appoemints',$fappoemint->fdoctor_id)->with(['success' => trans('messages.success')]);
     }
           

     /**
     *  
     * 
     * @param $data
     * 
     *
     */

    public function sendPayment($TargetCustomerCVVKey,$CurrencyId,$SpId){
      
    return $response = $this->buildRequest('/CashPay/api/CashPay/InitPayment', 'POST',$TargetCustomerCVVKey,$CurrencyId,$SpId );
       
        
    }

    public function sendConf($cod){
      
      return $responsee = $this->buildcRequest('/CashPay/api/CashPay/ConfirmPayment', 'POST',$cod );
         
          
      }
 // private function encryptPassword($key, $plaintext)
    //{
    //$method = 'aes-256-cbc';
    //$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
    //return base64_encode(openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv));
   // }

}
