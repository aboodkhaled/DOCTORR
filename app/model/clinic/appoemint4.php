<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve4_total;
use App\model\clinic\serve4_tprice;
use App\model\clinic\serve4_price;
use App\model\clinic\serve4_thin;
use App\model\clinic\serve4;
use App\model\clinic;
use App\User;

class appoemint4 extends Model
{
    protected $table = "appoemint4s";
    protected $fillable = [
        'user_id',  'serve4_id', 'serve4_price_id',  'serve4_thin_id', 'serve4_total_id','serve4_tprice_id','date', 'reson','clinic_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id',  'user_id',  'serve4_id', 'serve4_price_id',  'serve4_thin_id', 'serve4_total_id','serve4_tprice_id','date', 'reson','clinic_id');
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function serve3(){
        return $this->belongsTo('App\model\clinic\serve4', 'serve4_id', 'id');
      }

      public function serve4_price(){
        return $this->belongsTo('App\model\clinic\serve4_price', 'serve4_price_id', 'id');
      }

      public function serve4_thin(){
        return $this->belongsTo('App\model\clinic\serve4_thin', 'serve4_thin_id', 'id');
      }

      public function serve4_total(){
        return $this->belongsTo('App\model\clinic\serve4_total', 'serve4_total_id', 'id');
      }

      public function clinic(){
        return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
      }
      public function serve4_tprice(){
        return $this->belongsTo('App\model\clinic\serve4_tprice', 'serve4_tprice_id', 'id');
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
