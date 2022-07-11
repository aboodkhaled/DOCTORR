<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\model\fhosbital\fcuontry;

use App\model\fhosbital\fcity;
use Spatie\Translatable\HasTranslations;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fspecialty;
use App\model\address;
use App\model\fhosbital\fmate;

use App\model\fhosbital\fschedule;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital\fdoctor_serve;
use App\Model\fhosbital\fuser_axam;
use App\Model\fhosbital\fuser_diagno;
use App\Model\fhosbital\fuser_medicen;
use App\Model\fhosbital\fuser_xray;
use App\Model\fhosbital;

class fdoctor extends Authenticatable
{
  use Notifiable;
   
    
  protected $table ="fdoctors";
    
    protected $fillable = [
       'doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','fcuontry_id','fcity_id','address', 'fspecialty_id', 'fdepartment_id',  'photo', 
         'active','fhosbital_id','remember_token', 'created_at', 'updated_at',
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
    return $query -> select('id','doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','fcuontry_id','fcity_id','address', 'fspecialty_id', 'fdepartment_id',  'photo', 
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

    public function fdepartment(){
      return $this->belongsTo('App\model\fhosbital\fdepartment', 'fdepartment_id', 'id');
    }

    public function fspecialty(){
        return $this->belongsTo('App\model\fhosbital\fspecialty', 'fspecialty_id', 'id');
      }

      public function fdoctor_serve(){
        return $this -> hasMany(fdoctor_serve::class, 'fdoctor_id', 'id' );
    }
    public function fappoemint(){
      return $this -> hasMany(fappoemint::class, 'fdoctor_id', 'id' );
  }

  public function fmate(){
    return $this -> hasMany(fmate::class, 'fdoctor_id', 'id' );
}



    public function fschedule(){
      return $this -> hasMany(fschedule::class, 'fdoctor_id', 'id' );
  }

  public function fcuontry(){
    return $this->belongsTo('App\model\fhosbital\fcuontry', 'fcuontry_id', 'id');
  }
  public function fcity(){
    return $this->belongsTo('App\model\fhosbital\fcity', 'fcity_id', 'id');
  }

  public function fuser_axam(){
    return $this -> hasMany(fuser_axam::class, 'fdoctor_id', 'id' );
}

public function fuser_diagno(){
  return $this -> hasMany(fuser_diagno::class, 'fdoctor_id', 'id' );
}

public function fuser_medicen(){
  return $this -> hasMany(fuser_medicen::class, 'fdoctor_id', 'id' );
}

public function fuser_xray(){
  return $this -> hasMany(fuser_xray::class, 'fdoctor_id', 'id' );
}

public function fhosbital(){
    return $this->belongsTo('App\model\fhosbital', 'fhosbital_id', 'id');
  }
}
