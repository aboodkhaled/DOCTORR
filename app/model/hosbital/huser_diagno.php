<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\hosbital\happoemint;
use  App\model\hosbital;
use  App\User;
class huser_diagno extends Model
{
    protected $table ="huser_diagnos";
    protected $fillable = [
      'user_id','hdoctor_id','happoemint_id',  'diago','revew', 'created_at', 'updated_at',
  ];
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  public function user(){
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function hdoctor(){
    return $this->belongsTo(' App\model\hosbital\hdoctor', 'hdoctor_id', 'id');
  }

  public function happoemint(){
    return $this->belongsTo(' App\model\hosbital\happoemint', 'happoemint_id', 'id');
  }
}
