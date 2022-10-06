<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use App\model\fhosbital\fcuontry;
use App\model\fhosbital\fcity;
use App\model\fhosbital\fappoemint;
use App\model\fhosbital\fblood;
use App\model\fhosbital\fdepartment;
use App\model\fhosbital\fdoctor_serve;
use App\model\fhosbital\fdoctor;
use App\model\fhosbital\flabe_price;
use App\model\fhosbital\flabe;
use App\model\fhosbital\fx_price;
use App\model\fhosbital\fxray;
use App\model\fhosbital\fmate;
use App\model\fhosbital\foperation;
use App\model\fhosbital\fphar_price;
use App\model\fhosbital\fpharmice;
use App\model\fhosbital\fserve;
use  App\model\Role;
use App\model\hadmin;


class fhosbital extends Authenticatable
{
    use Notifiable;
    
    protected $table ="fhosbitals";


    protected $fillable = [
        'name',  'email', 'photo', 'password', 'mobile', 'active', 'sup_date','sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status', 'cuontry_id','city_id', 'address','hadmin_id','remember_token','des','role_id', 'created_at', 'updated_at',
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
        return $query -> select( 'id', 'name', 'email', 'photo', 'password', 'mobile',  'active', 'sup_date',  'sup_price', 'suppay_price', 'pay_time', 'pay_date', 'status',  'cuontry_id','city_id', 'address','hadmin_id','des' );
        
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

      public function fappoemint(){
        return $this -> hasMany(fappoemint::class, 'fhosbital_id', 'id' );
      }

      public function fblood(){
        return $this -> hasMany(fblood::class, 'fhosbital_id', 'id' );
      }

      public function fcity(){
        return $this -> hasMany(fcity::class, 'fhosbital_id', 'id' );
      }

      public function fcuontry(){
        return $this -> hasMany(fcuontry::class, 'fhosbital_id', 'id' );
      }

      public function fdepartment(){
        return $this -> hasMany(fdepartment::class, 'fhosbital_id', 'id' );
      }

      public function fdoctor(){
        return $this -> hasMany(fdoctor::class, 'fhosbital_id', 'id' );
      }

      public function fdoctor_serve(){
        return $this -> hasMany(fdoctor_serve::class, 'fhosbital_id', 'id' );
      }

      public function flabe_price(){
        return $this -> hasMany(flabe_price::class, 'fhosbital_id', 'id' );
      }

      public function flabe(){
        return $this -> hasMany(flabe::class, 'fhosbital_id', 'id' );
      }

      public function fmate(){
        return $this -> hasMany(fmate::class, 'fhosbital_id', 'id' );
      }

      public function foperation(){
        return $this -> hasMany(foperation::class, 'fhosbital_id', 'id' );
      }

      public function fphar_price(){
        return $this -> hasMany(fphar_price::class, 'fhosbital_id', 'id' );
      }

      public function fpharmice(){
        return $this -> hasMany(fpharmice::class, 'fhosbital_id', 'id' );
      }

      public function hadmin(){
        return $this->belongsTo('App\model\hadmin', 'hadmin_id', 'id');
      }


      public function fserve(){
        return $this -> hasMany(fserve::class, 'fhosbital_id', 'id' );
      }

      public function fspecialty(){
        return $this -> hasMany(fspecialty::class, 'fhosbital_id', 'id' );
      }

      public function fx_price(){
        return $this -> hasMany(fx_price::class, 'fhosbital_id', 'id' );
      }

      public function fxray(){
        return $this -> hasMany(fxray::class, 'fhosbital_id', 'id' );
      }

}
