<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\happoemint;
use  App\model\hosbital;
class hserve extends Model
{
    
   

    protected $table = "hserves";
    protected $fillable = [
        'serv_name', 'active','hosbital_id' ,  'created_at', 'updated_at',
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

   
    public function hdoctor_serve(){
        return $this -> hasMany(hdoctor_serve::class, 'hserve_id', 'id' );
    }
    public function happoemint(){
        return $this -> hasMany(appoemint::class, 'hserve_id', 'id' );
    }

    public function hosbital(){
        return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
      }
}
