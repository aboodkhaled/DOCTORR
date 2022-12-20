<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\labe;
use App\model\user_axam;

class lab_price extends Model
{
    protected $table ="lab_prices";
    protected $fillable = [
      'labe_id', 'price','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function labe(){
        return $this->belongsTo('App\model\labe', 'labe_id', 'id');
      }

      public function user_axam(){
        return $this -> hasMany(user_axam::class, 'lab_price_id', 'id' );
    }
}
