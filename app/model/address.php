<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor;
use App\model\sik;
class address extends Model
{
    protected $table = "addresses";
    protected $fillable = [
        'address_id', 'conutry', 'city', 'street', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function  doctor(){
        return $this->hasMany(doctor::class);
      }

      public function  sik(){
        return $this->hasMany(sik::class);
      }
}
