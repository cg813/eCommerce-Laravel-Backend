<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';

    protected $fillable = [
        'client_id', 'business_id', 'date', 'time_range', 'total', 'status'
    ];
}
