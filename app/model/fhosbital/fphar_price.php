<?php

namespace App\model\fhosbital;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use App\Model\fhosbital\fpharmice;
use App\Model\fhosbital\fuser_medicen;
use  App\model\fhosbital;
class fphar_price extends Model
{
    protected $table ="fphar_prices";
    protected $fillable = [
      'fpharmice_id', 'price','fhosbital_id','created_at', 'updated_at',
    ];
    protected $hidden = [
          'created_at', 'updated_at',
    ];

    public function fpharmice(){
        return $this->belongsTo('App\Model\fhosbital\fpharmice', 'fpharmice_id', 'id');
      }

      public function fuser_medicen(){
        return $this -> hasMany(fuser_medicen::class, 'fphar_price_id', 'id' );
    }
    public function fhosbital(){
        return $this->belongsTo('App\Model\fhosbital', 'fhosbital_id', 'id');
      }
}
