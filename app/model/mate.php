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

class mate extends Model
{
    protected $table = "mates";
    protected $fillable = [
        'user_id',  'doctor_id', 'appoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url', 'created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'doctor_id', 'appoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url', );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function doctor(){
        return $this->belongsTo('App\Model\doctor', 'doctor_id', 'id');
      }

      public function appoemint(){
        return $this->belongsTo('App\Model\appoemint', 'appoemint_id', 'id');
      }
}
