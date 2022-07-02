<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\sik;
use App\model\schedule;
use App\User;
use App\Model\department;
use App\Model\mate;
use App\Model\specialty;
use App\Model\doctor_serve;
use App\Model\serve;
use App\Model\transaction;
use App\Model\user_axam;
use App\Model\user_diagno;
use App\Model\user_medicen;
use App\Model\user_xray;
use App\Model\operation;
class appoemint extends Model
{
    protected $table = "appoemints";
    protected $fillable = [
        'user_id',  'doctor_id', 'department_id',  'specialty_id', 'doctor_serve_id','serve_id','adate', 'reson', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'doctor_id', 'department_id',  'specialty_id', 'doctor_serve_id','serve_id','adate', 'reson', );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function doctor(){
        return $this->belongsTo('App\Model\doctor', 'doctor_id', 'id');
      }

      public function department(){
        return $this->belongsTo('App\Model\department', 'department_id', 'id');
      }

      public function specialty(){
        return $this->belongsTo('App\Model\specialty', 'specialty_id', 'id');
      }

      public function doctor_serve(){
        return $this->belongsTo('App\Model\doctor_serve', 'doctor_serve_id', 'id');
      }

      public function serve(){
        return $this->belongsTo('App\Model\serve', 'serve_id', 'id');
      }

     public function transaction(){
       return $this->hasOne(transaction::class);
     }

     public function mate(){
      return $this -> hasMany(mate::class, 'appoemint_id', 'id' );
  }

  public function user_axam(){
    return $this -> hasMany(user_axam::class, 'appoemint_id', 'id' );
}

public function user_diagno(){
  return $this -> hasMany(user_diagno::class, 'appoemint_id', 'id' );
}

public function user_medicen(){
  return $this -> hasMany(user_medicen::class, 'appoemint_id', 'id' );
}

public function user_xray(){
  return $this -> hasMany(user_xray::class, 'appoemint_id', 'id' );
}

public function operation(){
  return $this -> hasMany(operation::class, 'appoemint_id', 'id' );
}
    
   
   
}
