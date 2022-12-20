<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\serve;
use App\model\appoemint;
class doctor_serve extends Model
{
    protected $table = "doctor_serves";
    protected $fillable = [
        'serve_id', 'doctor_id', 'price', 'active', 'created_at', 'updated_at',
    ];
    protected $hidden = [
         'created_at', 'updated_at',
    ];

  
  
      public function serve(){
          return $this->belongsTo('App\model\serve', 'serve_id', 'id');
        }
        public function doctor(){
            return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
          }
          public function scopeActive($query){
            return $query -> where('active',1);
        }
    
       public function scopeSelection($query){
        return $query -> select('id','serve_id', 'doctor_id', 'price', 'active',);
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
    public function appoemint(){
        return $this -> hasMany(appoemint::class, 'doctor_serve_id', 'id' );
    }

    
}
