<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class blood extends Model
{
    protected $table = "bloods";
    protected $fillable = [
        'blood_id', 'blood_typ', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];


   public function scopeSelection($query){
    return $query -> select('id','blood_typ', 'active',);
   }



public function scopeActive($query){
    return $query -> where('active',1);
}
  




   public function getActive(){
    return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
}
public function user(){
    return $this->hasMany('App\User', 'blood_id', 'id');
  }

}
