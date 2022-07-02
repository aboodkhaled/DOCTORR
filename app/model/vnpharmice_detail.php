<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\Model\admin;
class vnpharmice_detail extends Model

{
    protected $table ="vnpharmice_details";


    protected $fillable = [
        'venpharmice_id', 'admin',  'sup_price', 'suppay_price', 'pay_time', 'pay_date',  'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

   
    
      
    
  
   

      
  
      


}
