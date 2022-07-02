<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\happoemint;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hpharmice;
use App\model\hosbital\hphar_price;
use App\User;
use  App\model\hosbital;

class huser_medicen extends Model
{
    protected $table ="huser_medicens";
    protected $fillable = [
      'user_id','hdoctor_id','happoemint_id',  'hpharmice_id','hphar_price_id','qun','way_use', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function hpharmice(){
        return $this->belongsTo('App\model\hosbital\hpharmice', 'hpharmice_id', 'id');
      }
      public function hphar_price(){
        return $this->belongsTo('App\model\hosbital\hphar_price', 'hphar_price_id', 'id');
      }

      public function hdoctor(){
        return $this->belongsTo('App\model\hosbital\hdoctor', 'hdoctor_id', 'id');
      }

      public function happoemint(){
        return $this->belongsTo('App\model\hosbital\happoemint', 'happoemint_id', 'id');
      }
}
