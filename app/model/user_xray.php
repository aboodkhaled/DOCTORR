<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\xray;
use App\model\doctor;
use App\model\appoemint;
use App\model\x_price;
class user_xray extends Model
{
   
    protected $table ="user_xrays";
    protected $fillable = [
      'user_id','doctor_id','appoemint_id',  'xray_id','x_price_id','created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }

      public function xray(){
        return $this->belongsTo('App\model\xray', 'xray_id', 'id');
      }

      public function x_price(){
        return $this->belongsTo('App\model\x_price', 'x_price_id', 'id');
      }

      public function doctor(){
        return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
      }

      public function appoemint(){
        return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
      }
}
