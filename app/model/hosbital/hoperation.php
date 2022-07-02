<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\sik;
use App\model\hosbital\hschedule;
use App\User;
use App\Model\hosbital\happoemint;
use App\Model\hosbital\hspecialty;
use App\Model\hosbital\hdoctor_serve;
use App\Model\hosbital;
use App\Model\transaction;
class hoperation extends Model
{
    protected $table = "hoperations";
    protected $fillable = [
        'user_id', 'happoemint_id',  'status', 'confirm_id','operation_id','active','hosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id', 'appoemint_id',  'status', 'confirm_id','operation_id','active','hosbital_id', );
       }

       public function getActive(){
        return $this -> active == 1 ? ' دافع' : ' غير دافع';
    }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
     

      public function happoemint(){
        return $this->belongsTo('App\Model\hosbital\happoemint', 'happoemint_id', 'id');
      }
      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
