<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve2_total;
use App\model\clinic\serve2_tprice;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_thin;
use App\model\clinic;
use App\model\clinic\appoemint2;

class serve2 extends Model
{
  
   
    
  protected $table ="serve2s";
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
  public function serve2_tprice(){
    return $this -> hasMany(serve2_tprice::class, 'serve2_id', 'id' );
  }
  
  public function serve2_price(){
    return $this -> hasMany(serve2_price::class, 'serve2_id', 'id' );
  }
  public function serve2_thin(){
    return $this -> hasMany(serve2_thin::class, 'serve2_id', 'id' );
  }
  public function serve2_total(){
    return $this -> hasMany(serve2_total::class, 'serve2_id', 'id' );
  }

  public function clinic(){
      return $this->belongsTo('App\Model\clinic', 'clinic_id', 'id');
    }
    public function appoemint2(){
      return $this -> hasMany(appoemint2::class, 'serve2_tprice_id', 'id' );
  }
  
}
