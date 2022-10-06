<?php

namespace App\model;
use  App\model\role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use App\model\cuontry;
use App\model\city;
use App\model\fhosbital;
class hadmin extends Authenticatable
{
    use Notifiable;
   
    protected $table ="hadmins";


    protected $fillable = [
        'name',  'email', 'photo', 'password','mobile','cuontry_id','city_id','address','active', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',  'created_at', 'updated_at',
    ];

    public function scopeSelection($query){
        return $query -> select('id','name',  'email', 'photo', 'password','mobile','cuontry_id','city_id','address','active', );
       }

    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }

      public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }

    public function cuontry(){
        return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
      }
      public function city(){
        return $this->belongsTo('App\model\city', 'city_id', 'id');
      }

      public function fhosbital(){
        return $this->hasMany('App\model\fhosbital', 'hadmin_id', 'id');
      }

   
   

   
}
