<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fxray;
use App\model\fhosbital\fx_price;
use App\User;
use  App\model\fhosbital;

class fuser_xray extends Model
{
    protected $table ="fuser_xrays";
    protected $fillable = [
      'user_id','fdoctor_id','fappoemint_id',  'fxray_id','fx_price_id','created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function fxray(){
        return $this->belongsTo('App\model\fhosbital\fxray', 'fxray_id', 'id');
      }

      public function fx_price(){
        return $this->belongsTo('App\model\fhosbital\fx_price', 'fx_price_id', 'id');
      }

      public function fdoctor(){
        return $this->belongsTo('App\model\fhosbital\fdoctor', 'fdoctor_id', 'id');
      }

      public function fappoemint(){
        return $this->belongsTo('App\model\fhosbital\fappoemint', 'fappoemint_id', 'id');
      }
}
