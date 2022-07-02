<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\hosbital\hcity;
use App\model\venpharmice;
use App\model\venlabe;
use App\User;
use App\model\hosbital;
use App\model\hosbital\hdoctor;
class hcuontry extends Model
{
    
 
    protected $table = "hcuontries";
    protected $fillable = [
        'hcuontry_id', 'name',  'code', 'key','hosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name','code','key','hosbital_id', );
       }

       public function hcity(){
        return $this->hasMany('App\model\hosbital\hcity', 'hcuontry_id', 'id');
      }

      public function hdoctor(){
        return $this->hasMany('App\model\hosbital\hdoctor', 'hcuontry_id', 'id');
      }

      
      
      public function user(){
        return $this->hasMany('App\User', 'cuontry_id', 'id');
      }

      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
