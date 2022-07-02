<?php

namespace App\model;
use App\Model\appoemint;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $guarded = [];


    public function appoemint(){
        return $this->belongsTo('App\Model\appoemint', 'appoemint_id', 'id');
      }

}
