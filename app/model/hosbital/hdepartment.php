<?php

namespace App\model\hosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\hosbital\hdoctor;
use App\model\hosbital\happoemint;
use App\Model\hosbital;
class hdepartment extends Model
{
   
    protected $table ="hdepartments";
    protected $fillable = [
      'dept_name', 'dept_des',  'photo','active','hosbital_id', 'created_at', 'updated_at',
  ];
  protected $hidden = [
          'created_at', 'updated_at',
  ];
  public function scopeSelection($query){
    return $query -> select('id','dept_name', 'dept_des',  'photo','active','hosbital_id', );
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

    public function hdoctor(){
        return $this -> hasMany(hdoctor::class, 'hdepartment_id', 'id' );
    }

    public function happoemint(){
      return $this -> hasMany(happoemint::class, 'hdepartment_id', 'id' );
  }

  public function hosbital(){
    return $this->belongsTo('App\Model\hosbital', 'hosbital_id', 'id');
  }

}
