<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\model\admin;
class vnlabe_detail extends Model

{
    protected $table ="vnlabe_details";


    protected $fillable = [
        'venlabe_id', 'admin',  'sup_price', 'suppay_price', 'pay_time', 'pay_date',  'created_at', 'updated_at',
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
