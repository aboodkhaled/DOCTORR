<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\cuontry;
use App\model\venpharmice;
use App\model\venlabe;
use App\model\hosbital;
use App\model\fhosbital;
use App\User;
class city extends Model
{
  
   

    protected $table = "cities";
    protected $fillable = [
        'city_id', 'name',  'cuontry_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','cuontry_id', );
       }

       public function cuontry(){
        return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
      }

      public function venpharmice(){
        return $this->hasMany('App\model\venpharmice', 'city_id', 'id');
      }

      public function venlabe(){
        return $this->hasMany('App\model\venlabe', 'city_id', 'id');
      }
      public function hosbital(){
        return $this->hasMany('App\model\hosbital', 'city_id', 'id');
      }

      public function fhosbital(){
        return $this->hasMany('App\model\fhosbital', 'city_id', 'id');
      }

      public function user(){
        return $this->hasMany('App\User', 'city_id', 'id');
      }
      

   
}
