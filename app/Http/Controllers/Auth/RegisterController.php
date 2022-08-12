<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Services\SMSGateways\VictoryLinkSms;
use App\Http\Services\SMSServices;
use App\Http\Services\VerificationServices;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\model\blood;
use App\model\cuontry;
use App\model\city;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public $sms_services;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VerificationServices $sms_services)
    {
        $this->middleware('guest');
        $this -> sms_services = $sms_services;
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
// array $data
return Validator::make($data, [
      //  
         'name' => ['required','string','max:191'],
         'mobile' => ['required','unique:users'],
         'password'  => ['required','confirmed','min:8'],
         'sex' => ['required','in:male,female'],
         'sik_typ' => ['required','in:external,internal'],
         'socia' => ['required','in:marride,single'],
         'age' => ['required'],
         //'address' => ['required','max:191'],
         'blood_id' => ['required','exists:bloods,id'],
         //'photo' => ['required_without:id','mimes:jpg,jpeg,png'],
         'cuontry_id' => ['required','exists:cuontries,id'],
         'city_id' => ['required','exists:cities,id'],
         'address' => ['required'],
         //'email' => ['required|emai|unique:users,email']
        
         
     ]);


        //return Validator::make($data, [
          //  'name' => ['required', 'string', 'max:255'],
           // 'email' => [ 'string', 'email', 'max:255'],
           //'photo' => ['required_without:id|mimes:jpg,jpeg,png'],
          //  'mobile' => ['required', 'string', 'max:255', 'unique:users'],
          //  'password' => ['required', 'string', 'min:8', 'confirmed'],
           // 'sex' => ['required'],
           // 'sik_typ' => ['required'],
           // 'socia' => ['required'],
           // 'address' => ['required|max:191'],
           // 'blood_id' => ['required|exists:bloods,id'],
           // 'cuontry_id' => ['required|exists:cuontries,id'],
           // 'city_id' => ['required|exists:cities,id'],
        //]);
    }

    public function reg(){
     
      $bloods = blood::active()->get();
      $cuontrys = cuontry::get();
      $citys = city::get(); 
      return view('auth.register', compact('bloods','cuontrys','citys'));
    }

    public function creatt(UserRequest $request){
     // try{   
    
        if($request->has('photo')){
          $filepath = uploadImage('user', $request->photo);}
         
         //$verification = [];
  
         $user = new User();
         $user->name=$request->name;
         $user->mobile=$request->mobile;
         $user->password=bcrypt($request->password);
         $user->sex=$request->sex;
         $user->sik_typ=$request->sik_typ;
         $user->socia=$request->socia;
         $user->age=$request->age;
         $user->blood_id=$request->blood_id;
         $user->photo=$filepath;
         $user->cuontry_id=$request->cuontry_id;
         $user->city_id=$request->city_id;
         $user->address=$request->address;
         $user->save();
        
        // $user = User::create([
          //   'name' => $data['name'],
           //  'email' => $data['email'],
           //  'mobile' => $data['mobile'],
           //  'photo'=>$data[$filepath],
            // 'password' => Hash::make($data['password']),
             // 'sex' => $data['sex'],
             // 'sik_typ' => $data['sik_typ'],
             // 'socia' => $data['socia'],
            // 'age' => $data['age'],
            // 'blood_id' => $data['blood_id'],
            
            // 'cuontry_id' => $data['cuontry_id'],
            // 'city_id' => $data['city_id'],
             //'address'=>$data['address'], 
            
        // ]);
      
      
     // send OTP SMS code
              // set/ generate new code
            //  $verification['user_id'] = $user->id;
            //  $verification_data = $this->sms_services->setVerificationCode($verification);
            //  $message = $this->sms_services->getSMSVerifyMessageByAppName($verification_data -> code );
              //save this code in verifcation table
                //done
               //send code to user mobile by sms gateway   // note  there are no gateway credentails in config file
               # app(VictoryLinkSms::class) -> sendSms($user -> mobile,$message);
              DB::commit();
              toastr()->success(trans('messages.succe'));
              return  $user;
          //send to user  mobile
         // }catch(\Exception $ex){
           //   DB::rollback();
         // }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     try{   
    
     
       
       $verification = [];

       //$user = new User();
       //$user->name=$request->name;
       //$user->mobile=$request->mobile;
       //$user->password=bcrypt($request->password);
       //$user->sex=$request->sex;
       //$user->sik_typ=$request->sik_typ;
      // $user->socia=$request->socia;
      // $user->age=$request->age;
      // $user->blood_id=$request->blood_id;
       //$user->photo=$filepath;
       //$user->cuontry_id=$request->cuontry_id;
       //$user->city_id=$request->city_id;
       //$user->address=$request->address;
      // $user->save();
      
       $user = User::create([
           'name' => $data['name'],
         //  'email' => $data['email'],
           'mobile' => $data['mobile'],
             'password' => Hash::make($data['password']),
              'sex' => $data['sex'],
            'sik_typ' => $data['sik_typ'],
            'socia' => $data['socia'],
           'age' => $data['age'],
           'blood_id' => $data['blood_id'],
           //'photo'=>$data['photo'],
           'cuontry_id' => $data['cuontry_id'],
           'city_id' => $data['city_id'],
           'address'=>$data['address'], 
          
       ]);
    
    
   // send OTP SMS code
            // set/ generate new code
          //  $verification['user_id'] = $user->id;
          //  $verification_data = $this->sms_services->setVerificationCode($verification);
          //  $message = $this->sms_services->getSMSVerifyMessageByAppName($verification_data -> code );
            //save this code in verifcation table
              //done
             //send code to user mobile by sms gateway   // note  there are no gateway credentails in config file
             # app(VictoryLinkSms::class) -> sendSms($user -> mobile,$message);
            DB::commit();
            toastr()->success(trans('messages.succe'));
            return  $user;
        //send to user  mobile
        }catch(\Exception $ex){
            DB::rollback();
        }

    }

}