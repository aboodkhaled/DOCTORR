<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve3_total;
use App\model\clinic\serve3_tprice;
use App\model\clinic\serve3_price;
use App\model\clinic\serve3_thin;
use App\model\clinic\serve3;
use App\model\clinic;
use App\User;

class appoemint3 extends Model
{
    protected $table = "appoemint3s";
    protected $fillable = [
        'user_id',  'serve3_id', 'serve3_price_id',  'serve3_thin_id', 'serve3_total_id','serve3_tprice_id','date', 'reson','clinic_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id',  'user_id',  'serve3_id', 'serve3_price_id',  'serve3_thin_id', 'serve3_total_id','serve3_tprice_id','date', 'reson','clinic_id');
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function serve3(){
        return $this->belongsTo('App\model\clinic\serve3', 'serve3_id', 'id');
      }

      public function serve3_price(){
        return $this->belongsTo('App\model\clinic\serve3_price', 'serve3_price_id', 'id');
      }

      public function serve3_thin(){
        return $this->belongsTo('App\model\clinic\serve3_thin', 'serve3_thin_id', 'id');
      }

      public function serve3_total(){
        return $this->belongsTo('App\model\clinic\serve3_total', 'serve3_total_id', 'id');
      }

      public function clinic(){
        return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
      }
      public function serve3_tprice(){
        return $this->belongsTo('App\model\clinic\serve3_tprice', 'serve3_tprice_id', 'id');
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
