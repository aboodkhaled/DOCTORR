<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve4_total;
use App\model\clinic\serve4_tprice;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4_thin;
use App\model\clinic;
use App\model\clinic\appoemint2;

class serve4 extends Model
{
  
   
    
  protected $table ="serve4s";
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
  public function serve4_tprice(){
    return $this -> hasMany(serve4_tprice::class, 'serve4_id', 'id' );
  }
  
  public function serve4_price(){
    return $this -> hasMany(serve4_price::class, 'serve4_id', 'id' );
  }
  public function serve4_thin(){
    return $this -> hasMany(serve4_thin::class, 'serve4_id', 'id' );
  }
  public function serve4_total(){
    return $this -> hasMany(serve4_total::class, 'serve4_id', 'id' );
  }

  public function clinic(){
      return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
    }
    public function appoemint4(){
      return $this -> hasMany(appoemint4::class, 'serve4_id', 'id' );
  }
  
}
