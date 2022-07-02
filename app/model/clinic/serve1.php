<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve1_total;
use App\model\clinic\serve1_tprice;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_thin;
use App\model\clinic;
use App\model\clinic\appoemint1;

class serve1 extends Model
{
  protected $table ="serve1s";
  protected $fillable = [
    'name', 'think', 'price','thin_price','total','active','clinic_id', 'created_at', 'updated_at',
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
  public function serve1_tprice(){
    return $this -> hasMany(serve1_tprice::class, 'serve1_id', 'id' );
  }
  
  public function serve1_price(){
    return $this -> hasMany(serve1_price::class, 'serve1_id', 'id' );
  }
  public function serve1_thin(){
    return $this -> hasMany(serve1_thin::class, 'serve1_id', 'id' );
  }
  public function serve1_total(){
    return $this -> hasMany(serve1_total::class, 'serve1_id', 'id' );
  }

  public function clinic(){
      return $this->belongsTo('App\Model\clinic', 'clinic_id', 'id');
    }

    public function appoemint1(){
      return $this -> hasMany(appoemint1::class, 'serve1_id', 'id' );
  }
  
}
