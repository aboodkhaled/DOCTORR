<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\xray;
use App\model\user_xray;

class x_price extends Model
{
    protected $table ="x_prices";
    protected $fillable = [
      'xray_id', 'price','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function xray(){
        return $this->belongsTo('App\model\xray', 'xray_id', 'id');
      }

      public function user_xray(){
        return $this -> hasMany(user_xray::class, 'x_price_id', 'id' );
    }
}
