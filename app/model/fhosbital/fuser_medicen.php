<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fpharmice;
use App\model\fhosbital\fphar_price;
use App\User;
use  App\model\fhosbital;

class fuser_medicen extends Model
{
    protected $table ="fuser_medicens";
    protected $fillable = [
      'user_id','fdoctor_id','fappoemint_id',  'fpharmice_id','fphar_price_id','qun','way_use', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function fpharmice(){
        return $this->belongsTo('App\model\fhosbital\fpharmice', 'fpharmice_id', 'id');
      }
      public function fphar_price(){
        return $this->belongsTo('App\model\fhosbital\fphar_price', 'fphar_price_id', 'id');
      }

      public function fdoctor(){
        return $this->belongsTo('App\model\fhosbital\fdoctor', 'fdoctor_id', 'id');
      }

      public function fappoemint(){
        return $this->belongsTo('App\model\fhosbital\fappoemint', 'fappoemint_id', 'id');
      }
}
