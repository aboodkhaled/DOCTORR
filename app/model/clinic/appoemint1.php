<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve1_total;
use App\model\clinic\serve1_tprice;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_thin;
use App\model\clinic\serve1;
use App\model\clinic;
use App\User;
class appoemint1 extends Model
{
    protected $table = "appoemint1s";
    protected $fillable = [
        'user_id',  'serve1_id', 'serve1_price_id',  'serve1_thin_id', 'serve1_total_id','serve1_tprice_id','date', 'reson','clinic_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id',  'user_id',  'serve1_id', 'serve1_price_id',  'serve1_thin_id', 'serve1_total_id','serve1_tprice_id','date', 'reson','clinic_id');
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function serve1(){
        return $this->belongsTo('App\Model\clinic\serve1', 'serve1_id', 'id');
      }

      public function serve1_price(){
        return $this->belongsTo('App\Model\clinic\serve1_price', 'serve1_price_id', 'id');
      }

      public function serve1_thin(){
        return $this->belongsTo('App\Model\clinic\serve1_thin', 'serve1_thin_id', 'id');
      }

      public function serve1_total(){
        return $this->belongsTo('App\Model\clinic\serve1_total', 'serve1_total_id', 'id');
      }

      public function clinic(){
        return $this->belongsTo('App\Model\clinic', 'clinic_id', 'id');
      }
      public function serve1_tprice(){
        return $this->belongsTo('App\Model\clinic\serve1_tprice', 'serve1_tprice_id', 'id');
      }

     public function transaction(){
       return $this->hasOne(transaction::class);
     }

     public function hmate(){
      return $this -> hasMany(hmate::class, 'happoemint_id', 'id' );
  }

  public function user_axam(){
    return $this -> hasMany(user_axam::class, 'happoemint_id', 'id' );
}

public function user_diagno(){
  return $this -> hasMany(user_diagno::class, 'happoemint_id', 'id' );
}

public function user_medicen(){
  return $this -> hasMany(user_medicen::class, 'happoemint_id', 'id' );
}

public function user_xray(){
  return $this -> hasMany(user_xray::class, 'happoemint_id', 'id' );
}

public function hoperation(){
  return $this -> hasMany(hoperation::class, 'happoemint_id', 'id' );
}
    
}
