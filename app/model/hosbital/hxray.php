<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\hosbital\huser_xray;
use App\Model\hosbital\hx_price;
use App\model\hosbital;

class hxray extends Model
{
   
  protected $table ="hxrays";
  protected $fillable = [
    'name',  'price','active','hosbital_id', 'created_at', 'updated_at',
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
public function huser_xray(){
    return $this -> hasMany(huser_xray::class, 'hxray_id', 'id' );
  }

  public function hx_price(){
    return $this -> hasMany(hx_price::class, 'hxray_id', 'id' );
  }
  public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }
}
