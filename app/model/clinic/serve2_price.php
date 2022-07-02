<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve2_total;
use App\model\clinic\serve2_tprice;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2;
use App\model\clinic;
use App\model\clinic\appoemint2;

class serve2_price extends Model
{
   
   
    
    protected $table ="serve2_prices";
    protected $fillable = [
      'serve2_id', 'price', 'clinic_id', 'created_at', 'updated_at',
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

      public function serve2(){
        return $this->belongsTo('App\Model\clinic\serve2', 'serve2_id', 'id');
      }

      public function appoemint2(){
        return $this -> hasMany(appoemint2::class, 'serve2_price_id', 'id' );
    }
}
