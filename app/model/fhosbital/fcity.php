<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\fhosbital\fcuontry;
use App\model\venpharmice;
use App\model\venlabe;
use App\model\fhosbital;
use App\User;
use App\model\fhosbital\fdoctor;
class fcity extends Model
{
   

    protected $table = "fcities";
    protected $fillable = [
        'fcity_id', 'name',  'fcuontry_id','fhosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','fcuontry_id','fhosbital_id', );
       }

       public function fcuontry(){
        return $this->belongsTo('App\model\fhosbital\fcuontry', 'fcuontry_id', 'id');
      }

      

      
      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }

      public function user(){
        return $this->hasMany('App\User', 'fcity_id', 'id');
      }

      public function fdoctor(){
        return $this->hasMany('App\model\fhosbital\fdoctor', 'fcity_id', 'id');
      }
      

   
}
