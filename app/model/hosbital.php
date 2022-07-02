<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use App\model\hosbital\hcuontry;
use App\model\hosbital\hcity;
use App\model\hosbital\happoemint;
use App\model\hosbital\hblood;
use App\model\hosbital\hdepartment;
use App\model\hosbital\hdoctor_serve;
use App\model\hosbital\hdoctor;
use App\model\hosbital\hlabe_price;
use App\model\hosbital\hlabe;
use App\model\hosbital\hx_price;
use App\model\hosbital\hxray;
use App\model\hosbital\hmate;
use App\model\hosbital\hoperation;
use App\model\hosbital\hphar_price;
use App\model\hosbital\hpharmice;
use App\model\hosbital\hserve;
use  App\model\Role;


class hosbital extends Authenticatable
{
    use Notifiable;
    
    protected $table ="hosbitals";


    protected $fillable = [
        'name',  'email', 'photo', 'password', 'mobile', 'active', 'sup_date','sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status', 'cuontry_id','city_id', 'address','remember_token','des','role_id', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id',  'created_at', 'updated_at',
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
      public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
      
    
  
    public function scopeSelection($query){
        return $query -> select( 'id', 'name', 'email', 'photo', 'password', 'mobile',  'active', 'sup_date',  'sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status',  'cuontry_id','city_id', 'address','des' );
        
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

      public function happoemint(){
        return $this -> hasMany(happoemint::class, 'hosbital_id', 'id' );
      }

      public function hblood(){
        return $this -> hasMany(hblood::class, 'hosbital_id', 'id' );
      }

      public function hcity(){
        return $this -> hasMany(hcity::class, 'hosbital_id', 'id' );
      }

      public function hcuontry(){
        return $this -> hasMany(hcuontry::class, 'hosbital_id', 'id' );
      }

      public function hdepartment(){
        return $this -> hasMany(hdepartment::class, 'hosbital_id', 'id' );
      }

      public function hdoctor(){
        return $this -> hasMany(hdoctor::class, 'hosbital_id', 'id' );
      }

      public function hdoctor_serve(){
        return $this -> hasMany(hdoctor_serve::class, 'hosbital_id', 'id' );
      }

      public function hlabe_price(){
        return $this -> hasMany(hlabe_price::class, 'hosbital_id', 'id' );
      }

      public function hlabe(){
        return $this -> hasMany(hlabe::class, 'hosbital_id', 'id' );
      }

      public function hmate(){
        return $this -> hasMany(hmate::class, 'hosbital_id', 'id' );
      }

      public function hoperation(){
        return $this -> hasMany(hoperation::class, 'hosbital_id', 'id' );
      }

      public function hphar_price(){
        return $this -> hasMany(hphar_price::class, 'hosbital_id', 'id' );
      }

      public function hpharmice(){
        return $this -> hasMany(hpharmice::class, 'hosbital_id', 'id' );
      }


      public function hserve(){
        return $this -> hasMany(hserve::class, 'hosbital_id', 'id' );
      }

      public function hspecialty(){
        return $this -> hasMany(hspecialty::class, 'hosbital_id', 'id' );
      }

      public function hx_price(){
        return $this -> hasMany(hx_price::class, 'hosbital_id', 'id' );
      }

      public function hxray(){
        return $this -> hasMany(hxray::class, 'hosbital_id', 'id' );
      }

}
