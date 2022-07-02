<?php

namespace App\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\admin;
use App\Model\hosbital;
class role extends Model
{
   
    public $timestamps = false;
  
    protected $fillable = [
        'name', 'permission'   // json field
    ];

    public function users()
    {
        $this->hasMany(admin::class);
    }

    public function userss()
    {
        $this->hasMany(hosbital::class);
    }

    public function getPermissionAttribute($permission)
    {
        return json_decode($permission, true);
    }
}
