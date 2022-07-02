<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\sik;
use App\model\fhosbital\fschedule;
use App\User;
use App\Model\fhosbital\fappoemint;
use App\Model\fhosbital\fspecialty;
use App\Model\fhosbital\fdoctor_serve;
use App\Model\fhosbital;
use App\Model\transaction;
class foperation extends Model
{
    protected $table = "foperations";
    protected $fillable = [
        'user_id', 'fappoemint_id',  'status', 'confirm_id','foperation_id','active','fhosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id', 'fappoemint_id',  'status', 'confirm_id','foperation_id','active','hosbital_id', );
       }

       public function getActive(){
        return $this -> active == 1 ? ' دافع' : ' غير دافع';
    }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
     

      public function fappoemint(){
        return $this->belongsTo('App\Model\fhosbital\fappoemint', 'fappoemint_id', 'id');
      }
      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
