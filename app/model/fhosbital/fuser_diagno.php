<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fappoemint;
use  App\model\fhosbital;
use  App\User;
class fuser_diagno extends Model
{
    protected $table ="fuser_diagnos";
    protected $fillable = [
      'user_id','fdoctor_id','fappoemint_id',  'diago','revew', 'created_at', 'updated_at',
  ];
  protected $hidden = [
      'created_at', 'updated_at',
  ];
  public function user(){
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function fdoctor(){
    return $this->belongsTo(' App\model\fhosbital\fdoctor', 'fdoctor_id', 'id');
  }

  public function fappoemint(){
    return $this->belongsTo(' App\model\fhosbital\fappoemint', 'fappoemint_id', 'id');
  }
}
