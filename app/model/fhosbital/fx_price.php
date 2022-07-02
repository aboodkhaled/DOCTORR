<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\fhosbital\fxray;
use App\model\fhosbital\fuser_xray;
use App\model\fhosbital;
class fx_price extends Model
{
    protected $table ="fx_prices";
    protected $fillable = [
      'fxray_id', 'price','fhosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function dxray(){
        return $this->belongsTo('App\Model\fhosbital\fxray', 'fxray_id', 'id');
      }

      public function fuser_xray(){
        return $this -> hasMany(fuser_xray::class, 'fx_price_id', 'id' );
    }
    public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
