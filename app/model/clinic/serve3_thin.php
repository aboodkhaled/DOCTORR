<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve3_total;
use App\model\clinic\serve3_tprice;
use App\model\clinic\serve3_price;
use App\model\clinic\serve3;
use App\model\clinic;
use App\model\clinic\appoemint3;
class serve3_thin extends Model
{
   
   
    
    protected $table ="serve3_thins";
    protected $fillable = [
      'serve3_id', 'think', 'clinic_id', 'created_at', 'updated_at',
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

      public function serve3(){
        return $this->belongsTo('App\model\clinic\serve3', 'serve3_id', 'id');
      }

      public function appoemint3(){
        return $this -> hasMany(appoemint3::class, 'serve3_thin_id', 'id' );
    }
}
