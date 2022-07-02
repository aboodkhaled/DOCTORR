<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve1_total;
use App\model\clinic\serve1_tprice;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1;
use App\model\clinic;
use App\model\clinic\appoemint1;

class serve1_price extends Model
{
   
   
    
    protected $table ="serve1_prices";
    protected $fillable = [
      'serve1_id', 'price', 'clinic_id', 'created_at', 'updated_at',
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
    
  
    public function clinic(){
        return $this->belongsTo('App\Model\clinic', 'clinic_id', 'id');
      }

      public function serve1(){
        return $this->belongsTo('App\Model\clinic\serve1', 'serve1_id', 'id');
      }

      public function appoemint1(){
        return $this -> hasMany(appoemint1::class, 'serve1_price_id', 'id' );
    }
}
