<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\pharmice;
use App\model\doctor;
use App\model\appoemint;
use App\model\phar_price;
class user_medicen extends Model
{
    protected $table ="user_medicens";
    protected $fillable = [
      'user_id','doctor_id','appoemint_id',  'pharmice_id','phar_price_id','qun','way_use', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function pharmice(){
        return $this->belongsTo('App\model\pharmice', 'pharmice_id', 'id');
      }
      public function phar_price(){
        return $this->belongsTo('App\model\phar_price', 'phar_price_id', 'id');
      }

      public function doctor(){
        return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
      }

      public function appoemint(){
        return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
      }
}
