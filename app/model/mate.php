<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\sik;
use App\model\schedule;
use App\User;
use App\model\appoemint;
use App\model\specialty;
use App\model\doctor_serve;
use App\model\serve;
use App\model\transaction;

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
        return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
      }

      public function appoemint(){
        return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
      }
}
