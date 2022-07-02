<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\hosbital;
use App\Model\hosbital\huser_axam;
use App\Model\hosbital\hlabe;
class hlabe_price extends Model
{
    protected $table ="hlabe_prices";
    protected $fillable = [
      'hlabe_id', 'price','hosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function hlabe(){
        return $this->belongsTo('App\Model\hosbital\hlabe', 'hlabe_id', 'id');
      }

      public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }

      public function huser_axam(){
        return $this -> hasMany(huser_axam::class, 'hlab_price_id', 'id' );
    }
}
