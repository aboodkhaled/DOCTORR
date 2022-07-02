<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\happoemint;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hxray;
use App\model\hosbital\hx_price;
use App\User;
use  App\model\hosbital;

class huser_xray extends Model
{
    protected $table ="huser_xrays";
    protected $fillable = [
      'user_id','hdoctor_id','happoemint_id',  'hxray_id','hx_price_id','created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function hxray(){
        return $this->belongsTo('App\model\hosbital\hxray', 'hxray_id', 'id');
      }

      public function hx_price(){
        return $this->belongsTo('App\model\hosbital\hx_price', 'hx_price_id', 'id');
      }

      public function hdoctor(){
        return $this->belongsTo('App\model\hosbital\hdoctor', 'hdoctor_id', 'id');
      }

      public function happoemint(){
        return $this->belongsTo('App\model\hosbital\happoemint', 'happoemint_id', 'id');
      }
}
