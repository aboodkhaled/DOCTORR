<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve5_total;
use App\model\clinic\serve5_tprice;
use App\model\clinic\serve5_price;
use App\model\clinic\serve5_thin;
use App\model\clinic;
use App\model\clinic\appoemint2;

class serve5 extends Model
{
  
   
    
  protected $table ="serve5s";
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
  public function serve5_tprice(){
    return $this -> hasMany(serve5_tprice::class, 'serve5_id', 'id' );
  }
  
  public function serve5_price(){
    return $this -> hasMany(serve5_price::class, 'serve5_id', 'id' );
  }
  public function serve5_thin(){
    return $this -> hasMany(serve5_thin::class, 'serve5_id', 'id' );
  }
  public function serve5_total(){
    return $this -> hasMany(serve5_total::class, 'serve5_id', 'id' );
  }

  public function clinic(){
      return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
    }
    public function appoemint5(){
      return $this -> hasMany(appoemint5::class, 'serve5_id', 'id' );
  }
  
}
