<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\appoemint;

class specialty extends Model
{
   
    
    protected $table ="specialties";
    protected $fillable = [
      'special_name', 'active',  'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','special_name', 'active', );
   }

    
    public function scopeActive($query){
        return $query -> where('active',1);
    }

   
       

       public function getActive(){
        return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
    }
   
    public function doctor(){
        return $this -> hasMany(doctor::class, 'specialty_id', 'id' );
    }
    public function appoemint(){
        return $this -> hasMany(appoemint::class, 'specialty_id', 'id' );
    }
}
