<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\hosbital\huser_axam;
use App\model\hosbital\hlab_price;
use App\Model\hosbital;
class hlabe extends Model
{
   
    protected $table ="hlabes";
    protected $fillable = [
      'lab_name', 'axam_name',  'price','active','hosbital_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
    
      public function scopeActive($query){
        return $query -> where('active',1);
    }
      
    
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
    public function huser_axam(){
      return $this -> hasMany(huser_axam::class, 'hlabe_id', 'id' );
  }
  
  public function hlab_price(){
    return $this -> hasMany(hlab_price::class, 'hlabe_id', 'id' );
  }
  public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }
}
