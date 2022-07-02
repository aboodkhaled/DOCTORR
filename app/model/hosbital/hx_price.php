<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\hosbital\hxray;
use App\model\hosbital\huser_xray;
use App\model\hosbital;
class hx_price extends Model
{
    protected $table ="hx_prices";
    protected $fillable = [
      'hxray_id', 'price','hosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function hxray(){
        return $this->belongsTo('App\Model\hosbital\hxray', 'hxray_id', 'id');
      }

      public function huser_xray(){
        return $this -> hasMany(huser_xray::class, 'hx_price_id', 'id' );
    }
    public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
