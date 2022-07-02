<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital;
class fspecialty extends Model
{
   
    protected $table ="fspecialties";
    protected $fillable = [
      'special_name', 'active','fhosbital_id',  'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','special_name', 'active','fhosbital_id', );
   }

    
    public function scopeActive($query){
        return $query -> where('active',1);
    }

   
       

       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
   
    public function fdoctor(){
        return $this -> hasMany(fdoctor::class, 'fspecialty_id', 'id' );
    }
    public function fappoemint(){
        return $this -> hasMany(fappoemint::class, 'fspecialty_id', 'id' );
    }
    public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
