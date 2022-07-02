<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\hosbital\hcuontry;
use App\model\venpharmice;
use App\model\venlabe;
use App\model\hosbital;
use App\User;
use App\model\hosbital\hdoctor;
class hcity extends Model
{
   

    protected $table = "hcities";
    protected $fillable = [
        'hcity_id', 'name',  'hcuontry_id','hosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','hcuontry_id','hosbital_id', );
       }

       public function hcuontry(){
        return $this->belongsTo('App\model\hosbital\hcuontry', 'hcuontry_id', 'id');
      }

      

      
      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }

      public function user(){
        return $this->hasMany('App\User', 'city_id', 'id');
      }

      public function hdoctor(){
        return $this->hasMany('App\model\hosbital\hdoctor', 'hcity_id', 'id');
      }
      

   
}
