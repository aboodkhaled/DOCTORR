<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve4_total;
use App\model\clinic\serve4_tprice;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4;
use App\model\clinic;
use App\model\clinic\appoemint4;
class serve4_total extends Model
{
   
   
    
    protected $table ="serve4_totals";
    protected $fillable = [
      'serve4_id', 'total', 'clinic_id', 'created_at', 'updated_at',
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

      public function serve4(){
        return $this->belongsTo('App\model\clinic\serve4', 'serve4_id', 'id');
      }

      public function appoemint4(){
        return $this -> hasMany(appoemint4::class, 'serve4_total_id', 'id' );
    }
}
