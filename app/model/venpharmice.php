<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use App\model\cuontry;
use App\model\city;
class venpharmice extends Authenticatable
{
    use Notifiable;
    
    protected $table ="venpharmices";


    protected $fillable = [
       'venpharmice_id', 'name',  'email', 'photo', 'password', 'mobile', 'active', 'sup_date', 'sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status', 'cuontry_id','city_id', 'address','remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',   'created_at', 'updated_at',
    ];

    public function scopeActive($query){
        return $query -> where('active',1);
    }
    public function scopeStatus($query){
        return $query -> where('status',1);
    }

    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }
      
    
  
    public function scopeSelection($query){
        return $query -> select( 'id', 'name', 'email', 'photo', 'password', 'mobile',  'active', 'sup_date',  'sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status',  'cuontry_id','city_id', 'address' );
        
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }

    public function getStatus(){
        return $this -> status == 1 ? ' غير دافع' : ' دافع ';
    }

    public function cuontry(){
        return $this->belongsTo('App\model\cuontry', 'cuontry_id', 'id');
      }
      public function city(){
        return $this->belongsTo('App\model\city', 'city_id', 'id');
      }
}
