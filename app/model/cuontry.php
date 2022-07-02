<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\city;
use App\model\venpharmice;
use App\model\venlabe;
use App\User;
use App\model\hosbital;
use App\model\fhosbital;
class cuontry extends Model
{
  
 
    protected $table = "cuontries";
    protected $fillable = [
        'cuontry_id', 'name',  'code', 'key', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','code','key', );
       }

       public function city(){
        return $this->hasMany('App\model\city', 'cuontry_id', 'id');
      }

      public function venpharmice(){
        return $this->hasMany('App\model\venpharmice', 'cuontry_id', 'id');
      }

      public function venlabe(){
        return $this->hasMany('App\model\venlabe', 'cuontry_id', 'id');
      }
      public function hosbital(){
        return $this->hasMany('App\model\hosbital', 'cuontry_id', 'id');
      }
      public function fhosbital(){
        return $this->hasMany('App\model\fhosbital', 'cuontry_id', 'id');
      }
      public function user(){
        return $this->hasMany('App\User', 'cuontry_id', 'id');
      }
}
