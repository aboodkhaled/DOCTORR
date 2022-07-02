<?php

namespace App\model;
use  App\model\role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
class admin extends Authenticatable
{
    use Notifiable;
   
    protected $table ="admins";


    protected $fillable = [
        'name',  'email', 'photo', 'password', 'role_id','remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role_id', 'created_at', 'updated_at',
    ];

    public function getPhotoAttribute($val){
        return ($val !==null) ? asset('assets/'. $val) : "";
      }

    public function role()
    {
        return $this->belongsTo(role::class, 'role_id');
    }
   

    public function hasAbility($permission)    //products  //mahoud -> admin can't see brands
    {
        $role = $this->role;

        if (!$role) {
            return false;
        }

        foreach ($role->permission as $_permission) {
            if (is_array($permission) && in_array($_permission, $permission)) {
                return true;
            } else if (is_string($permission) && strcmp($permission, $_permission) == 0) {
                return true;
            }
        }
        return false;
    }
}
