<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VehicleTypeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return $item;
        });
    }
}
