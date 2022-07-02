<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\user_axam;
use App\model\lab_price;
class labe extends Model
{
    
  
  protected $table ="labes";
  protected $fillable = [
    'lab_name', 'axam_name',  'price','active', 'created_at', 'updated_at',
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
  public function user_axam(){
    return $this -> hasMany(user_axam::class, 'labe_id', 'id' );
}

public function lab_price(){
  return $this -> hasMany(lab_price::class, 'labe_id', 'id' );
}
}
