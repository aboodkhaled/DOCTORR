<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve5_total;
use App\model\clinic\serve5_tprice;
use App\model\clinic\serve5_price;
use App\model\clinic\serve5;
use App\model\clinic;
use App\model\clinic\appoemint5;

class serve5_tprice extends Model
{
    
   
    
    protected $table ="serve5_tprices";
    protected $fillable = [
      'serve5_id', 'thin_price', 'clinic_id', 'created_at', 'updated_at',
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
        return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
      }

      public function serve5(){
        return $this->belongsTo('App\model\clinic\serve5', 'serve5_id', 'id');
      }

      public function appoemint5(){
        return $this -> hasMany(appoemint5::class, 'serve5_tprice_id', 'id' );
    }
}
