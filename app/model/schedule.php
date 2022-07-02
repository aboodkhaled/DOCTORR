<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
class schedule extends Model
{
    protected $table = "schedules";
    protected $fillable = [
     'doctor_id', 'day', 'stime', 'etime', 'active', 'created_at', 'updated_at',
    ];
    protected $hidden = [
         'created_at', 'updated_at', 
    ];

    public function scopeActive($query){
        return $query -> where('active',1);
    }
      
    
  
    public function scopeSelection($query){
        return $query -> select('id','doctor_id','day','stime','etime',  'active', );
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }

    public function doctor(){
        return $this->belongsTo(doctor::class, 'doctor_id', 'id');
      }
}
