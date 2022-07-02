<?php

namespace App\model;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\model\cuontry;

use App\model\city;
use Spatie\Translatable\HasTranslations;
use App\model\department;
use App\model\specialty;
use App\model\address;
use App\model\mate;

use App\model\schedule;
use App\model\appoemint;
use App\model\doctor_serve;
use App\Model\user_axam;
use App\Model\user_diagno;
use App\Model\user_medicen;
use App\Model\user_xray;
class doctor extends Authenticatable
{
  use Notifiable;
 
    
  protected $table ="doctors";
    
    protected $fillable = [
        'doctor_id','doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','cuontry_id','city_id','address', 'specialty_id', 'department_id',  'photo', 
         'active','remember_token', 'created_at', 'updated_at',
    ];
    
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',  'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','doctor_id','doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','cuontry_id','city_id','address', 'specialty_id', 'department_id',  'photo', 
    'active', );
   }
    

    public function scopeActive($query){
      return $query -> where('active',1);
  }
    
  public function getPhotoAttribute($val){
    return ($val !==null) ? asset('assets/'. $val) : "";
  }

  

     public function getActive(){
      return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
  }

    public function department(){
      return $this->belongsTo('App\Model\department', 'department_id', 'id');
    }

    public function specialty(){
        return $this->belongsTo('App\Model\specialty', 'specialty_id', 'id');
      }

      public function doctor_serve(){
        return $this -> hasMany(doctor_serve::class, 'doctor_id', 'id' );
    }
    public function appoemint(){
      return $this -> hasMany(appoemint::class, 'doctor_id', 'id' );
  }

  public function mate(){
    return $this -> hasMany(mate::class, 'doctor_id', 'id' );
}



    public function schedule(){
      return $this -> hasMany(schedule::class, 'doctor_id', 'id' );
  }

  public function cuontry(){
    return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
  }
  public function city(){
    return $this->belongsTo('App\model\city', 'city_id', 'id');
  }

  public function user_axam(){
    return $this -> hasMany(user_axam::class, 'doctor_id', 'id' );
}

public function user_diagno(){
  return $this -> hasMany(user_diagno::class, 'doctor_id', 'id' );
}

public function user_medicen(){
  return $this -> hasMany(user_medicen::class, 'doctor_id', 'id' );
}

public function user_xray(){
  return $this -> hasMany(user_xray::class, 'doctor_id', 'id' );
}


      

}
