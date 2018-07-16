<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Installments extends Model
{
    protected $table='installments';
    protected $fillable=[
        'user_id',
        'product_name',
        'price_before_interest',
          'interest',
           'price_after_interest',
            'price_per_month',
             'price_last_month',
              'start_month',
               'client_name',
                'client_mobile',
      
    ];


     public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
