<?php

namespace App\Models;

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class City extends Eloquent
{
    protected $collection = 'cities';
    protected $fillable = ['name', 'zipCode', 'country'];
}

