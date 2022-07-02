<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\fhosbital\fuser_axam;
use App\model\fhosbital\flab_price;
use App\Model\fhosbital;
class flabe extends Model
{
   
    protected $table ="flabes";
    protected $fillable = [
      'lab_name', 'axam_name',  'price','active','fhosbital_id', 'created_at', 'updated_at',
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
    public function fuser_axam(){
      return $this -> hasMany(fuser_axam::class, 'flabe_id', 'id' );
  }
  
  public function flab_price(){
    return $this -> hasMany(flab_price::class, 'flabe_id', 'id' );
  }
  public function fhosbital(){
    return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
  }
}
