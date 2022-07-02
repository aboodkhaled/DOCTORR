<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\doctor;
use App\model\appoemint;
class department extends Model
{ 
  
    protected $table ="departments";
    protected $fillable = [
      'dept_name', 'dept_des',  'photo','active', 'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','dept_name', 'dept_des',  'photo','active', );
   }

    public function scopeActive($query){
      return $query -> where('active',1);
  }
    
  public function getPhotoAttribute($val){
    return ($val !==null) ? asset('assets/'. $val) : "";
  }

  

     public function getActive(){
      return $this -> active == 1 ? ' مفعل' : ' غير مفعل';
  }

    public function doctor(){
        return $this -> hasMany(doctor::class, 'department_id', 'id' );
    }

    public function appoemint(){
      return $this -> hasMany(appoemint::class, 'department_id', 'id' );
  }

   

       
}
