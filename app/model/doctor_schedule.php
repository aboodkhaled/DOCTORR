<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\doctor; 
use App\model\appoemint;
class doctor_schedule extends Model
{
    protected $table = "doctor_schedules";
    protected $fillable = [
       'doctor_schedule_id', 'doctor_id', 'schedule_id', 'created_at', 'updated_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function appoemint(){
        return $this->belongsToMany(appoemint::class);
      }

}
