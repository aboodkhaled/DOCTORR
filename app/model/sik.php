<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\model\blood;
use App\User;
use App\model\appoemint;
class sik extends Model
{
  
  
protected $table ="siks";
  
  protected $fillable = [
    'sik_id','user_id', 'sex', 'sik_typ','socia',  'sdate','sik_ref', 'ref_name','sik_des',  'mobile', 'age',  'blood_id',  'ref_mobile', 'photo',  'address', 
  ];
  protected $hidden = [
    'created_at', 'updated_at',
];
  
  


    
    public function getPhotoAttribute($val){
      return ($val !==null) ? asset('assets/'. $val) : "";
    }
  
    
  
    
  
      public function blood(){
        return $this->belongsTo('App\model\blood', 'blood_id', 'id');
      }
  
      public function user(){
          return $this->belongsTo('App\User', 'user_id', 'id');
        }
}
