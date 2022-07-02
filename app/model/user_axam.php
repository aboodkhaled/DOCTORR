<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\labe;
use App\model\doctor;
use App\model\appoemint;
use App\model\lab_price;
class user_axam extends Model
{
    protected $table ="user_axams";
    protected $fillable = [
      'user_id','doctor_id','appoemint_id',  'labe_id','lab_price_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
    'created_at', 'updated_at',
  ];
 //protected $dateFormat= 'UNW';
    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function labe(){
        return $this->belongsTo('App\model\labe', 'labe_id', 'id');
      }

      public function lab_price(){
        return $this->belongsTo('App\model\lab_price', 'lab_price_id', 'id');
      }

      public function doctor(){
        return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
      }
    
      public function appoemint(){
        return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
      }
}
