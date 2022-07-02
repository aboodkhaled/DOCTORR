<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\sik;
use App\model\schedule;
use App\User;
use App\Model\hosbital\happoemint;
use App\Model\hosbital\hspecialty;
use App\Model\hosbital\hdoctor_serve;
use App\Model\hosbital\hserve;
use App\Model\transaction;
use App\Model\hosbital;
class hmate extends Model
{
    protected $table = "hmates";
    protected $fillable = [
        'user_id',  'hdoctor_id', 'happoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url','hosbital_id' , 'created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'doctor_id', 'appoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url','hosbital_id', );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function hdoctor(){
        return $this->belongsTo('App\Model\hosbital\hdoctor', 'hdoctor_id', 'id');
      }

      public function happoemint(){
        return $this->belongsTo('App\Model\hosbital\appoemint', 'happoemint_id', 'id');
      }
      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
