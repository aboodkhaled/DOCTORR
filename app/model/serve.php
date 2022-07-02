<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\doctor_serve;
use App\model\appoemint;
class serve extends Model
{
   
   

    protected $table = "serves";
    protected $fillable = [
        'serv_name', 'active',   'created_at', 'updated_at',
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

   
    public function doctor_serve(){
        return $this -> hasMany(doctor_serve::class, 'serve_id', 'id' );
    }
    public function appoemint(){
        return $this -> hasMany(appoemint::class, 'serve_id', 'id' );
    }
}
