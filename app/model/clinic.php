<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use App\model\plase;
use App\model\clinic\serve1_price;
use App\model\clinic\serve1_thin;
use App\model\clinic\serve1_total;
use App\model\clinic\serve1_tprice;
use App\model\clinic\serve1;
use App\model\clinic\serve2_price;
use App\model\clinic\serve2_thin;
use App\model\clinic\serve2_total;
use App\model\clinic\serve2_tprice;
use App\model\clinic\serve2;
use App\model\clinic\appoemint1;
use App\model\clinic\appoemint2;

class clinic extends Authenticatable
{
    use Notifiable;
   
    protected $table ="clinics";


    protected $fillable = [
        'name',  'email', 'photo', 'password', 'mobile', 'active', 'plase_id','address','admin', 'remember_token','created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',  'created_at', 'updated_at',
    ];

    public function scopeActive($query){
        return $query -> where('active',1);
    }
  

    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }
      
    
  
    public function scopeSelection($query){
        return $query -> select( 'id',  'name',  'email', 'photo', 'password', 'mobile', 'active', 'plase_id','address','admin' );
        
       }
  
       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }

    public function getStatus(){
        return $this -> status == 1 ? ' غير دافع' : ' دافع ';
    }

    public function plase(){
        return $this->belongsTo('App\model\plase', 'plase_id', 'id');
      }
      public function city(){
        return $this->belongsTo('App\model\city', 'city_id', 'id');
      }

      

      public function serve1_tprice(){
        return $this -> hasMany(serve1_tprice::class, 'clinic_id', 'id' );
      }
      
      public function serve1_price(){
        return $this -> hasMany(serve1_price::class, 'clinic_id', 'id' );
      }
      public function serve1_thin(){
        return $this -> hasMany(serve1_thin::class, 'clinic_id', 'id' );
      }
      public function serve1_total(){
        return $this -> hasMany(serve1_total::class, 'clinic_id', 'id' );
      }
      public function serve1(){
        return $this -> hasMany(serve1::class, 'clinic_id', 'id' );
      }

      public function serve2_tprice(){
        return $this -> hasMany(serve2_tprice::class, 'clinic_id', 'id' );
      }
      
      public function serve2_price(){
        return $this -> hasMany(serve2_price::class, 'clinic_id', 'id' );
      }
      public function serve2_thin(){
        return $this -> hasMany(serve2_thin::class, 'clinic_id', 'id' );
      }
      public function serve2_total(){
        return $this -> hasMany(serve2_total::class, 'clinic_id', 'id' );
      }
      public function serve2(){
        return $this -> hasMany(serve2::class, 'clinic_id', 'id' );
      }
      public function appoemint1(){
        return $this -> hasMany(appoemint1::class, 'clinic_id', 'id' );
    }
    public function appoemint2(){
      return $this -> hasMany(appoemint2::class, 'clinic_id', 'id' );
  }

      

     
}
