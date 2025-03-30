<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{
    protected $table = 'insurances';
    protected $fillable= [
        'vehicle_id',
        'type',
        'expire_date',
        'price'
    ];
}
