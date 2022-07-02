<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\sik;
use App\model\schedule;
use App\User;
use App\Model\fhosbital\fappoemint;
use App\Model\fhosbital\fspecialty;
use App\Model\fhosbital\fdoctor_serve;
use App\Model\fosbital\fserve;
use App\Model\transaction;
use App\Model\fhosbital;
class fmate extends Model
{
    protected $table = "fmates";
    protected $fillable = [
        'user_id',  'fdoctor_id', 'fappoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url','fhosbital_id' , 'created_at', 'updated_at',
    ];
    protected $hidden = [
       'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id', 'user_id',  'fdoctor_id', 'fappoemint_id',  'meeting_id', 'topic','start_at','duration', 'password','start_url','join_url','fhosbital_id', );
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function fdoctor(){
        return $this->belongsTo('App\Model\fhosbital\fdoctor', 'fdoctor_id', 'id');
      }

      public function fappoemint(){
        return $this->belongsTo('App\Model\fhosbital\fappoemint', 'fappoemint_id', 'id');
      }
      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
