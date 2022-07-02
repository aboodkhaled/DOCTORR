<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\user_medicen;
use  App\model\phar_price;
class pharmice extends Model
{
   
  
  
  
protected $table ="pharmices";
protected $fillable = [
  'name', 'use_way',  'exp_date','price','qun','active', 'created_at', 'updated_at',
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
public function user_medicen(){
  return $this -> hasMany(user_medicen::class, 'pharmice_id', 'id' );
}

public function phar_price(){
  return $this -> hasMany(phar_price::class, 'pharmice_id', 'id' );
}

}
