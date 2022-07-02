<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\model\doctor;
use App\model\appoemint;
class user_diagno extends Model
{
   
    protected $table ="user_diagnos";
    protected $fillable = [
      'user_id','doctor_id','appoemint_id',  'diago','revew', 'created_at', 'updated_at',
  ];
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  public function user(){
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function doctor(){
    return $this->belongsTo('App\model\doctor', 'doctor_id', 'id');
  }

  public function appoemint(){
    return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
  }
    
}
