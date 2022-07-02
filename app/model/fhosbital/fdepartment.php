<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\fhosbital\fdoctor;
use App\model\fhosbital\fappoemint;
use App\Model\fhosbital;
class fdepartment extends Model
{
   
    protected $table ="fdepartments";
    protected $fillable = [
      'dept_name', 'dept_des',  'photo','active','fhosbital_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','dept_name', 'dept_des',  'photo','active','fhosbital_id', );
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

    public function fdoctor(){
        return $this -> hasMany(fdoctor::class, 'fdepartment_id', 'id' );
    }

    public function fappoemint(){
      return $this -> hasMany(fappoemint::class, 'fdepartment_id', 'id' );
  }

  public function fhosbital(){
    return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
  }

}
