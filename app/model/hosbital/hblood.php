<?php

namespace App\model\hosbital;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\hosbital;
class hblood extends Model
{
    protected $table = "hbloods";
    protected $fillable = [
        'hblood_id', 'blood_typ','active','hosbital_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];


   public function scopeSelection($query){
    return $query -> select('id','blood_typ', 'active','hosbital_id',);
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

  public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }

}
