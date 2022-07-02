<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor;
use App\model\hosbital\happoemint;
use App\model\hosbital;
class hspecialty extends Model
{
   
    protected $table ="hspecialties";
    protected $fillable = [
      'special_name', 'active','hosbital_id',  'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','special_name', 'active','hosbital_id', );
   }

    
    public function scopeActive($query){
        return $query -> where('active',1);
    }

   
       

       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
   
    public function hdoctor(){
        return $this -> hasMany(hdoctor::class, 'hspecialty_id', 'id' );
    }
    public function happoemint(){
        return $this -> hasMany(happoemint::class, 'hspecialty_id', 'id' );
    }
    public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
