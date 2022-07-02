<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use  App\model\fhosbital;
use App\Model\fhosbital\fuser_axam;
use App\Model\fosbital\flabe;
class flabe_price extends Model
{
    protected $table ="flabe_prices";
    protected $fillable = [
      'flabe_id', 'price','fhosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function flabe(){
        return $this->belongsTo('App\Model\fhosbital\flabe', 'flabe_id', 'id');
      }

      public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }

      public function fuser_axam(){
        return $this -> hasMany(fuser_axam::class, 'flab_price_id', 'id' );
    }
}
