<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\model\clinic;
use App\model\venpharmice;
use App\model\venlabe;
use App\model\hosbital;
use App\User;

class plase extends Model
{
   
   

    protected $table = "plases";
    protected $fillable = [
         'name',   'created_at', 'updated_at',
    ];
    protected $hidden = [
           'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name', );
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
