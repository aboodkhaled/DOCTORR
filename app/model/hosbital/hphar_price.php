<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\hosbital\hpharmice;
use App\Model\hosbital\huser_medicen;
use  App\model\hosbital;
class hphar_price extends Model
{
    protected $table ="hphar_prices";
    protected $fillable = [
      'hpharmice_id', 'price','hosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function hpharmice(){
        return $this->belongsTo('App\Model\hosbital\hpharmice', 'hpharmice_id', 'id');
      }

      public function huser_medicen(){
        return $this -> hasMany(huser_medicen::class, 'hphar_price_id', 'id' );
    }
    public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
