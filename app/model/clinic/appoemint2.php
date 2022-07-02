<?php

namespace App\model\clinic;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\clinic\serve2_total;
use App\model\clinic\serve2_tprice;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_thin;
use App\model\clinic\serve2;
use App\model\clinic;
use App\User;

class appoemint2 extends Model
{
    protected $table = "appoemint2s";
    protected $fillable = [
        'user_id',  'serve2_id', 'serve2_price_id',  'serve2_thin_id', 'serve2_total_id','serve2_tprice_id','date', 'reson','clinic_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    //protected $dateFormat= 'Uv';
    public function scopeSelection($query){
        return $query -> select('id',  'user_id',  'serve2_id', 'serve2_price_id',  'serve2_thin_id', 'serve2_total_id','serve2_tprice_id','date', 'reson','clinic_id');
       }

       public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function serve2(){
        return $this->belongsTo('App\Model\clinic\serve2', 'serve2_id', 'id');
      }

      public function serve2_price(){
        return $this->belongsTo('App\Model\clinic\serve2_price', 'serve2_price_id', 'id');
      }

      public function serve2_thin(){
        return $this->belongsTo('App\Model\clinic\serve2_thin', 'serve2_thin_id', 'id');
      }

      public function serve2_total(){
        return $this->belongsTo('App\Model\clinic\serve2_total', 'serve2_total_id', 'id');
      }

      public function clinic(){
        return $this->belongsTo('App\Model\clinic', 'clinic_id', 'id');
      }
      public function serve2_tprice(){
        return $this->belongsTo('App\Model\clinic\serve2_tprice', 'serve2_tprice_id', 'id');
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
