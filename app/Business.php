<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{

    protected $table = 'businesses';

    protected $fillable = [
        'name', 'address', 'city', 'floor', 'house_cnt', 'note', 'client_id'
    ];
}
