<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable= [
        'make',
        'model',
        'production_year',
        'chassis_number',
        'registration_number',
        'registration_expiry',
        'engine_size(ccm)',
        'engine_power(hp)'
    ];
}
