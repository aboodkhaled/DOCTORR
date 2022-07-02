<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\model\doctor;
use App\model\appoemint;
use App\model\sik;
use App\model\user_axam;
use App\model\user_medicen;
use App\model\user_xray;
use App\model\user_diango;
use App\model\cuontry;
use App\model\city;
use App\model\blood;
use App\model\mate;
use App\model\user_verfication;
use App\Model\operation;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\model\clinic\appoemint1;
use App\model\clinic\appoemint2;
use App\Model\hosbital\huser_axam;
use App\Model\hosbital\huser_diagno;
use App\Model\hosbital\huser_medicen;
use App\Model\hosbital\huser_xray;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name', 'email', 'mobile', 'password','sex', 'sik_typ','socia','age','blood_id','photo','cuontry_id','city_id','address' ,'updated_at', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','blood_id','cuontry_id','city_id', 'remember_token','updated_at', 'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' =>  'datetime',
    ];
    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }

    public function codes(){
        return $this -> hasMany(user_verfication::class,'user_id');
    }

    public function sik(){
        return $this -> hasMany(sik::class,'user_id','id');
    }
    public function user_axam(){
        return $this -> hasMany(user_axam::class, 'user_id', 'id' );
    }
    public function user_medicen(){
        return $this -> hasMany(user_medicen::class, 'user_id', 'id' );
      }
      public function user_xray(){
        return $this -> hasMany(user_xray::class, 'user_id', 'id' );
      }
      public function user_diango(){
        return $this -> hasMany(user_diango::class, 'user_id', 'id' );
      }

      public function appoemint(){
        return $this -> hasMany(appoemint::class, 'user_id', 'id' );
    }
    public function appoemint1(){
      return $this -> hasMany(appoemint1::class, 'user_id', 'id' );
  }
  public function appoemint2(){
    return $this -> hasMany(appoemint2::class, 'user_id', 'id' );
}
    public function cuontry(){
        return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
      }
      public function city(){
        return $this->belongsTo('App\model\city', 'city_id', 'id');
      }
      public function blood(){
        return $this->belongsTo('App\model\blood', 'blood_id', 'id');
      }

      public function mate(){
        return $this -> hasMany(mate::class, 'user_id', 'id' );
    }

    public function operation(){
      return $this -> hasMany(operation::class, 'user_id', 'id' );
    }

    public function huser_axam(){
      return $this -> hasMany(huser_axam::class, 'user_id', 'id' );
  }
  
  public function huser_diagno(){
    return $this -> hasMany(huser_diagno::class, 'user_id', 'id' );
  }
  
  public function huser_medicen(){
    return $this -> hasMany(huser_medicen::class, 'user_id', 'id' );
  }
  
  public function huser_xray(){
    return $this -> hasMany(huser_xray::class, 'user_id', 'id' );
  }


     // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
