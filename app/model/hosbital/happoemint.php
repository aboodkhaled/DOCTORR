<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hsik;
use App\model\hosbital\hschedule;
use App\User;
use App\Model\hosbital\hdepartment;
use App\Model\hosbital\hmate;
use App\Model\hosbital\hspecialty;
use App\Model\hosbital\hdoctor_serve;
use App\Model\hosbital\hserve;
use App\Model\hosbital\htransaction;
use App\Model\hosbital\huser_axam;
use App\Model\hosbital\huser_diagno;
use App\Model\hosbital\huser_medicen;
use App\Model\hosbital\huser_xray;
use App\Model\hosbital\hoperation;
use App\Model\hosbital;

class happoemint extends Model
{
    protected $table = "happoemints";
    protected $fillable = [
        'user_id',  'hdoctor_id', 'hdepartment_id',  'hspecialty_id', 'hdoctor_serve_id','hserve_id','adate', 'reson','hosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'hdoctor_id', 'hdepartment_id',  'hspecialty_id', 'hdoctor_serve_id','hserve_id','adate', 'reson','hosbital_id' );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function hdoctor(){
        return $this->belongsTo('App\model\hosbital\hdoctor', 'hdoctor_id', 'id');
      }

      public function hdepartment(){
        return $this->belongsTo('App\Model\hosbital\hdepartment', 'hdepartment_id', 'id');
      }

      public function hspecialty(){
        return $this->belongsTo('App\Model\hosbital\hspecialty', 'hspecialty_id', 'id');
      }

      public function hdoctor_serve(){
        return $this->belongsTo('App\Model\hosbital\hdoctor_serve', 'hdoctor_serve_id', 'id');
      }

      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
      public function hserve(){
        return $this->belongsTo('App\Model\hosbital\hserve', 'hserve_id', 'id');
      }

     public function transaction(){
       return $this->hasOne(transaction::class);
     }

     public function hmate(){
      return $this -> hasMany(hmate::class, 'happoemint_id', 'id' );
  }

  public function huser_axam(){
    return $this -> hasMany(huser_axam::class, 'happoemint_id', 'id' );
}

public function huser_diagno(){
  return $this -> hasMany(huser_diagno::class, 'happoemint_id', 'id' );
}

public function huser_medicen(){
  return $this -> hasMany(huser_medicen::class, 'happoemint_id', 'id' );
}

public function huser_xray(){
  return $this -> hasMany(huser_xray::class, 'happoemint_id', 'id' );
}

public function hoperation(){
  return $this -> hasMany(hoperation::class, 'happoemint_id', 'id' );
}
    
}
