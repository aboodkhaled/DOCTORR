<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\fhosbital\fuser_medicen;
use  App\model\fhosbital\fphar_price;
use App\model\fhosbital;
class fpharmice extends Model
{
  
  
protected $table ="fpharmices";
protected $fillable = [
  'name', 'use_way',  'exp_date','price','qun','active','fhosbital_id', 'created_at', 'updated_at',
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
public function fuser_medicen(){
  return $this -> hasMany(fuser_medicen::class, 'fpharmice_id', 'id' );
}

public function fphar_price(){
  return $this -> hasMany(fphar_price::class, 'fpharmice_id', 'id' );
}
public function fhosbital(){
    return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
  }

}
