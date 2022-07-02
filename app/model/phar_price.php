<?php

namespace App\model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\pharmice;
use  App\model\user_medicen;

class phar_price extends Model
{
    protected $table ="phar_prices";
    protected $fillable = [
      'pharmice_id', 'price','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function pharmice(){
        return $this->belongsTo('App\Model\pharmice', 'pharmice_id', 'id');
      }

      public function user_medicen(){
        return $this -> hasMany(user_medicen::class, 'phar_price_id', 'id' );
    }
}
