<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleService
{
    public function getDistance(array $addresses): float|int
    {
        $origins = array_map(function ($address) {
            return $address['city'] . ', ' . $address['zip'] . ', ' . $address['country'];
        }, $addresses);

        $destinations = implode('|', $origins);
        $origins = implode('|', $origins);

        $apiKey = config('services.google.api_key');
        $response = Http::get("https://maps.googleapis.com/maps/api/directions/json", [
            'origin' => $origins,
            'destination' => $destinations,
            'key' => $apiKey,
        ]);

        $data = $response->json();

        return $data['routes'][0]['legs'][0]['distance']['value'] / 1000; // Distance in kilometers
    }
}
