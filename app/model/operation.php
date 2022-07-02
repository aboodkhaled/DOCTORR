<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\sik;
use App\model\schedule;
use App\User;
use App\Model\appoemint;
use App\Model\specialty;
use App\Model\doctor_serve;
use App\Model\serve;
use App\Model\transaction;
class operation extends Model
{
    protected $table = "operations";
    protected $fillable = [
        'user_id', 'appoemint_id',  'status', 'confirm_id','operation_id','active','created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id', 'appoemint_id',  'status', 'confirm_id','operation_id','active', );
       }

       public function getActive(){
        return $this -> active == 1 ? ' دافع' : ' غير دافع';
    }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
     

      public function appoemint(){
        return $this->belongsTo('App\Model\appoemint', 'appoemint_id', 'id');
      }
}
