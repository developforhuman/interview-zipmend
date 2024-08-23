<?php

namespace App\Models;

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class VehicleType extends Eloquent
{
    protected $collection = 'vehicleTypes';
    protected $fillable = ['number', 'cost_km', 'minimum'];
}

