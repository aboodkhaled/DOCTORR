<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\hosbital\huser_medicen;
use  App\model\hosbital\hphar_price;
use App\model\hosbital;
class hpharmice extends Model
{
  
  
protected $table ="hpharmices";
protected $fillable = [
  'name', 'use_way',  'exp_date','price','qun','active','hosbital_id', 'created_at', 'updated_at',
];
protected $hidden = [
      'created_at', 'updated_at',
];

  

  public function scopeActive($query){
    return $query -> where('active',1);
}
  




   public function getActive(){
    return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
}
public function huser_medicen(){
  return $this -> hasMany(huser_medicen::class, 'hpharmice_id', 'id' );
}

public function hphar_price(){
  return $this -> hasMany(hphar_price::class, 'hpharmice_id', 'id' );
}
public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }

}
