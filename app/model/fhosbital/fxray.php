<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\fhosbital\fuser_xray;
use App\Model\fhosbital\fx_price;
use App\model\fhosbital;

class fxray extends Model
{
   
  protected $table ="fxrays";
  protected $fillable = [
    'name',  'price','active','fhosbital_id', 'created_at', 'updated_at',
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
public function fuser_xray(){
    return $this -> hasMany(fuser_xray::class, 'fxray_id', 'id' );
  }

  public function fx_price(){
    return $this -> hasMany(fx_price::class, 'fxray_id', 'id' );
  }
  public function fhosbital(){
    return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
  }
}
