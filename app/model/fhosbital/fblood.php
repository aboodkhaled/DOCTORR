<?php

namespace App\model\fhosbital;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\fhosbital;
class fblood extends Model
{
    protected $table = "fbloods";
    protected $fillable = [
        'fblood_id', 'blood_typ','active','fhosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];


   public function scopeSelection($query){
    return $query -> select('id','blood_typ', 'active','fhosbital_id',);
   }



public function scopeActive($query){
    return $query -> where('active',1);
}
  




   public function getActive(){
    return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
}
public function user(){
    return $this->hasMany('App\User', 'fblood_id', 'id');
  }

  public function fhosbital(){
    return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
  }

}
