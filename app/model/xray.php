<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\user_xray;
use App\model\x_price;
class xray extends Model
{
    
  protected $table ="xrays";
  protected $fillable = [
    'name',  'price','active', 'created_at', 'updated_at',
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
public function user_xray(){
    return $this -> hasMany(user_xray::class, 'xray_id', 'id' );
  }

  public function x_price(){
    return $this -> hasMany(x_price::class, 'xray_id', 'id' );
  }
  
}
