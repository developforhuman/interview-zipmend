<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class PriceCalculationService
{
    public function calculatePrices(Collection $vehicleTypes, float|int $distance): array
    {
        $prices = [];

        foreach ($vehicleTypes as $vehicleType) {
            $price = $distance * $vehicleType->cost_km;
            if ($price < $vehicleType->minimum) {
                $price = $vehicleType->minimum;
            }

            $prices[] = [
                'vehicle_type' => $vehicleType->number,
                'price' => $price,
            ];
        }

        return $prices;
    }
}
