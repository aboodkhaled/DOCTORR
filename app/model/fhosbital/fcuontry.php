<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\fhosbital\fcity;
use App\model\venpharmice;
use App\model\venlabe;
use App\User;
use App\model\fhosbital;
use App\model\fhosbital\fdoctor;
class fcuontry extends Model
{
    
 
    protected $table = "fcuontries";
    protected $fillable = [
        'fcuontry_id', 'name',  'code', 'key','fhosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','code','key','fhosbital_id', );
       }

       public function fcity(){
        return $this->hasMany('App\model\fhosbital\fcity', 'fcuontry_id', 'id');
      }

      public function fdoctor(){
        return $this->hasMany('App\model\fhosbital\fdoctor', 'fcuontry_id', 'id');
      }

      
      
      public function user(){
        return $this->hasMany('App\User', 'fcuontry_id', 'id');
      }

      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
