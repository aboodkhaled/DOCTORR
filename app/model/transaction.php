<?php

namespace App\model;
use App\model\appoemint;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $guarded = [];


    public function appoemint(){
        return $this->belongsTo('App\model\appoemint', 'appoemint_id', 'id');
      }

}
