<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve3_total;
use App\model\clinic\serve3_tprice;
use App\model\clinic\serve3_price;
use App\model\clinic\serve3_thin;
use App\model\clinic;
use App\model\clinic\appoemint2;

class serve3 extends Model
{
  
   
    
  protected $table ="serve3s";
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
  public function serve3_tprice(){
    return $this -> hasMany(serve3_tprice::class, 'serve3_id', 'id' );
  }
  
  public function serve3_price(){
    return $this -> hasMany(serve3_price::class, 'serve3_id', 'id' );
  }
  public function serve3_thin(){
    return $this -> hasMany(serve3_thin::class, 'serve3_id', 'id' );
  }
  public function serve3_total(){
    return $this -> hasMany(serve3_total::class, 'serve3_id', 'id' );
  }

  public function clinic(){
      return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
    }
    public function appoemint3(){
      return $this -> hasMany(appoemint3::class, 'serve3_id', 'id' );
  }
  
}
