<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculatePriceRequest;
use App\Http\Resources\VehicleTypeCollection;
use App\Http\Resources\VehicleTypeResource;
use App\Models\VehicleType;
use App\Services\GoogleService;
use App\Services\PriceCalculationService;

class TransportController extends Controller
{
    protected GoogleService $googleService;
    protected PriceCalculationService $priceCalculationService;

    public function __construct(GoogleService $googleService, PriceCalculationService $priceCalculationService)
    {
        $this->googleService = $googleService;
        $this->priceCalculationService = $priceCalculationService;
    }

    public function calculatePrice(CalculatePriceRequest $request): \Illuminate\Http\JsonResponse
    {
        $addresses = $request->input('addresses');
        $distance = $this->googleService->getDistance($addresses);
        $vehicleTypes = VehicleType::all();
        $prices = $this->priceCalculationService->calculatePrices($vehicleTypes, $distance);

        VehicleTypeResource::withoutWrapping();
        return (new VehicleTypeCollection(collect($prices)))
            ->response()
            ->header('Content-Type', 'application/json')
            ->header('Cache-Control', 'no-cache');
    }
}
