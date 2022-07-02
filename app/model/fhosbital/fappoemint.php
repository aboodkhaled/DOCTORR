<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fsik;
use App\model\fhosbital\fschedule;
use App\User;
use App\Model\fhosbital\fdepartment;
use App\Model\fhosbital\fmate;
use App\Model\fhosbital\fspecialty;
use App\Model\fhosbital\fdoctor_serve;
use App\Model\fhosbital\fserve;
use App\Model\fhosbital\ftransaction;
use App\Model\fhosbital\fuser_axam;
use App\Model\fhosbital\fuser_diagno;
use App\Model\fhosbital\fuser_medicen;
use App\Model\fhosbital\fuser_xray;
use App\Model\fhosbital\foperation;
use App\Model\fhosbital;

class fappoemint extends Model
{
    protected $table = "fappoemints";
    protected $fillable = [
        'user_id',  'fdoctor_id', 'fdepartment_id',  'fspecialty_id', 'fdoctor_serve_id','fserve_id','adate', 'reson','fhosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'fdoctor_id', 'fdepartment_id',  'fspecialty_id', 'fdoctor_serve_id','fserve_id','adate', 'reson','fhosbital_id' );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function fdoctor(){
        return $this->belongsTo('App\Model\fhosbital\fdoctor', 'fdoctor_id', 'id');
      }

      public function fdepartment(){
        return $this->belongsTo('App\Model\fhosbital\fdepartment', 'fdepartment_id', 'id');
      }

      public function fspecialty(){
        return $this->belongsTo('App\Model\fhosbital\fspecialty', 'fspecialty_id', 'id');
      }

      public function fdoctor_serve(){
        return $this->belongsTo('App\Model\fhosbital\fdoctor_serve', 'fdoctor_serve_id', 'id');
      }

      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
      public function fserve(){
        return $this->belongsTo('App\Model\fhosbital\fserve', 'fserve_id', 'id');
      }

     public function transaction(){
       return $this->hasOne(transaction::class);
     }

     public function fmate(){
      return $this -> hasMany(fmate::class, 'fappoemint_id', 'id' );
  }

  public function fuser_axam(){
    return $this -> hasMany(fuser_axam::class, 'fappoemint_id', 'id' );
}

public function fuser_diagno(){
  return $this -> hasMany(fuser_diagno::class, 'fappoemint_id', 'id' );
}

public function fuser_medicen(){
  return $this -> hasMany(fuser_medicen::class, 'fappoemint_id', 'id' );
}

public function fuser_xray(){
  return $this -> hasMany(fuser_xray::class, 'fappoemint_id', 'id' );
}

public function foperation(){
  return $this -> hasMany(foperation::class, 'fappoemint_id', 'id' );
}
    
}
