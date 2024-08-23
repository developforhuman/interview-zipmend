<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleTypeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'vehicle_type' => $this['vehicle_type'],
            'price' => $this['price'],
        ];
    }
}
