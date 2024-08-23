<?php
namespace Tests\Feature;

use Tests\TestCase;

class TransportPriceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function test_it_calculates_transport_price()
    {
        $requestData = [
            'addresses' => [
                [
                    'country' => 'DE',
                    'zip' => '10115',
                    'city' => 'Berlin',
                ],
                [
                    'country' => 'DE',
                    'zip' => '20095',
                    'city' => 'Hamburg',
                ],
            ],
        ];

        $response = $this->postJson('/api/calculate-price', $requestData);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                'vehicle_type',
                'price',
            ],
        ]);
    }
}
