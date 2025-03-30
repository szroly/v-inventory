<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class First_Aids extends Model
{
    protected $table = 'first_aids';
    protected $fillable= [
        'vehicle_id',
        'manufacturer',
        'expire_date'
    ];
}
