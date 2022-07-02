<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fserve;
use App\model\fhosbital\fappoemint;
use App\Model\fhosbital;
class fdoctor_serve extends Model
{
    protected $table = "fdoctor_serves";
    protected $fillable = [
        'fserve_id', 'fdoctor_id', 'price', 'active','fhosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
         'created_at', 'updated_at',
    ];

  
  
      public function fserve(){
          return $this->belongsTo('App\Model\fhosbital\fserve', 'fserve_id', 'id');
        }
        public function fdoctor(){
            return $this->belongsTo('App\Model\fhosbital\fdoctor', 'fdoctor_id', 'id');
          }

          public function fhosbital(){
            return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
          }
          public function scopeActive($query){
            return $query -> where('active',1);
        }
    
       public function scopeSelection($query){
        return $query -> select('id','fserve_id', 'fdoctor_id', 'price', 'active','fhosbital_id',);
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
    public function fappoemint(){
        return $this -> hasMany(fappoemint::class, 'fdoctor_serve_id', 'id' );
    }
}
