<?php

namespace App\model;

use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class user_verfication extends Model
{
   public $table = 'users_verificationcodes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'code', 'updated_at', 'created_at',
   ];

  
   
}
