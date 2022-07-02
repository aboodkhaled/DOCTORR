<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\happoemint;
use  App\model\hosbital;
use  App\model\hosbital\hlabe;
use  App\model\hosbital\hdoctor;
use  App\model\hosbital\hlab_price;
use  App\User;


class huser_axam extends Model
{
    protected $table ="huser_axams";
    protected $fillable = [
      'user_id','hdoctor_id','happoemint_id',  'hlabe_id','hlab_price_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
 //protected $dateFormat= 'UNW';
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function hlabe(){
        return $this->belongsTo('App\model\hosbital\hlabe', 'hlabe_id', 'id');
      }

      public function hlab_price(){
        return $this->belongsTo('App\model\hosbital\hlab_price', 'hlab_price_id', 'id');
      }

      public function hdoctor(){
        return $this->belongsTo('App\model\hosbital\hdoctor', 'hdoctor_id', 'id');
      }
    
      public function happoemint(){
        return $this->belongsTo('App\model\hosbital\happoemint', 'happoemint_id', 'id');
      }
}
