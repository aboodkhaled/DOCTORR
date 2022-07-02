<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fappoemint;
use  App\model\fhosbital;
class fserve extends Model
{
    
   

    protected $table = "fserves";
    protected $fillable = [
        'serv_name', 'active','fhosbital_id' ,  'created_at', 'updated_at',
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

   
    public function fdoctor_serve(){
        return $this -> hasMany(fdoctor_serve::class, 'fserve_id', 'id' );
    }
    public function fappoemint(){
        return $this -> hasMany(fappoemint::class, 'fserve_id', 'id' );
    }

    public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
