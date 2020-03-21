<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

    protected $table = 'order_details';

    protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];

    // public function business()
    // {
    //     return $this->hasOne('App\Business', 'foreign_key', 'business_id');
    // }
}
