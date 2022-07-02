<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fappoemint;
use  App\model\fhosbital;
use  App\model\fhosbital\flabe;
use  App\model\fhosbital\fdoctor;
use  App\model\fhosbital\flab_price;
use  App\User;


class fuser_axam extends Model
{
    protected $table ="fuser_axams";
    protected $fillable = [
      'user_id','fdoctor_id','fappoemint_id',  'flabe_id','flab_price_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
 //protected $dateFormat= 'UNW';
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function flabe(){
        return $this->belongsTo('App\model\fhosbital\flabe', 'flabe_id', 'id');
      }

      public function flab_price(){
        return $this->belongsTo('App\model\fhosbital\flab_price', 'flab_price_id', 'id');
      }

      public function fdoctor(){
        return $this->belongsTo('App\model\fhosbital\fdoctor', 'fdoctor_id', 'id');
      }
    
      public function fappoemint(){
        return $this->belongsTo('App\model\fhosbital\fappoemint', 'fappoemint_id', 'id');
      }
}
