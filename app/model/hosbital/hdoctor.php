<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\model\hosbital\hcuontry;

use App\model\hosbital\hcity;
use Spatie\Translatable\HasTranslations;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hspecialty;
use App\model\address;
use App\model\hosbital\hmate;

use App\model\hosbital\hschedule;
use App\model\hosbital\happoemint;
use App\model\hosbital\hdoctor_serve;
use App\Model\hosbital\huser_axam;
use App\Model\hosbital\huser_diagno;
use App\Model\hosbital\huser_medicen;
use App\Model\hosbital\huser_xray;
use App\Model\hosbital;

class hdoctor extends Authenticatable
{
  use Notifiable;
   
    
  protected $table ="hdoctors";
    
    protected $fillable = [
        'hdoctor_id','doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','hcuontry_id','hcity_id','address', 'hspecialty_id', 'hdepartment_id',  'photo', 
         'active','hosbital_id','remember_token', 'created_at', 'updated_at',
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
    return $query -> select('id','hdoctor_id','doc_name', 'doc_degry', 'sex', 'doc_des','email','password', 'mobile',  'perth_date','hcuontry_id','hcity_id','address', 'hspecialty_id', 'hdepartment_id',  'photo', 
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

    public function hdepartment(){
      return $this->belongsTo('App\Model\hosbital\hdepartment', 'hdepartment_id', 'id');
    }

    public function hspecialty(){
        return $this->belongsTo('App\Model\hosbital\hspecialty', 'hspecialty_id', 'id');
      }

      public function hdoctor_serve(){
        return $this -> hasMany(hdoctor_serve::class, 'hdoctor_id', 'id' );
    }
    public function happoemint(){
      return $this -> hasMany(happoemint::class, 'hdoctor_id', 'id' );
  }

  public function hmate(){
    return $this -> hasMany(hmate::class, 'hdoctor_id', 'id' );
}



    public function hschedule(){
      return $this -> hasMany(hschedule::class, 'hdoctor_id', 'id' );
  }

  public function hcuontry(){
    return $this->belongsTo('App\model\hosbital\hcuontry', 'hcuontry_id', 'id');
  }
  public function hcity(){
    return $this->belongsTo('App\model\hosbital\hcity', 'hcity_id', 'id');
  }

  public function huser_axam(){
    return $this -> hasMany(huser_axam::class, 'hdoctor_id', 'id' );
}

public function huser_diagno(){
  return $this -> hasMany(huser_diagno::class, 'hdoctor_id', 'id' );
}

public function huser_medicen(){
  return $this -> hasMany(huser_medicen::class, 'hdoctor_id', 'id' );
}

public function huser_xray(){
  return $this -> hasMany(huser_xray::class, 'hdoctor_id', 'id' );
}

public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }
}
