<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hserve;
use App\model\hosbital\happoemint;
use App\Model\hosbital;
class hdoctor_serve extends Model
{
    protected $table = "hdoctor_serves";
    protected $fillable = [
        'hserve_id', 'hdoctor_id', 'price', 'active','hosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
         'created_at', 'updated_at',
    ];

  
  
      public function hserve(){
          return $this->belongsTo('App\Model\hosbital\hserve', 'hserve_id', 'id');
        }
        public function hdoctor(){
            return $this->belongsTo('App\Model\hosbital\hdoctor', 'hdoctor_id', 'id');
          }

          public function hosbital(){
            return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
          }
          public function scopeActive($query){
            return $query -> where('active',1);
        }
    
       public function scopeSelection($query){
        return $query -> select('id','hserve_id', 'hdoctor_id', 'price', 'active','hosbital_id',);
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
    public function happoemint(){
        return $this -> hasMany(happoemint::class, 'hdoctor_serve_id', 'id' );
    }
}
