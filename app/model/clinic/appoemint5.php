<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve5_total;
use App\model\clinic\serve5_tprice;
use App\model\clinic\serve5_price;
use App\model\clinic\serve5_thin;
use App\model\clinic\serve5;
use App\model\clinic;
use App\User;

class appoemint5 extends Model
{
    protected $table = "appoemint5s";
    protected $fillable = [
        'user_id',  'serve5_id', 'serv5_price_id',  'serve5_thin_id', 'serve5_total_id','serve5_tprice_id','date', 'reson','clinic_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id',  'user_id',  'serve5_id', 'serve5_price_id',  'serve5_thin_id', 'serve5_total_id','serve5_tprice_id','date', 'reson','clinic_id');
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function serve5(){
        return $this->belongsTo('App\model\clinic\serve5', 'serve5_id', 'id');
      }

      public function serve5_price(){
        return $this->belongsTo('App\model\clinic\serve5_price', 'serve5_price_id', 'id');
      }

      public function serve5_thin(){
        return $this->belongsTo('App\model\clinic\serve5_thin', 'serve5_thin_id', 'id');
      }

      public function serve5_total(){
        return $this->belongsTo('App\model\clinic\serve5_total', 'serve5_total_id', 'id');
      }

      public function clinic(){
        return $this->belongsTo('App\model\clinic', 'clinic_id', 'id');
      }
      public function serve5_tprice(){
        return $this->belongsTo('App\model\clinic\serve5_tprice', 'serve5_tprice_id', 'id');
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
