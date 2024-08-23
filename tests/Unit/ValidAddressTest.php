<?php

namespace Tests\Unit;

use App\Rules\ValidAddress;
use App\Models\City;
use Tests\TestCase;

class ValidAddressTest extends TestCase
{
    /** @test */
    public function it_validates_existing_address()
    {
        $city = City::create(['name' => 'Berlin', 'zipCode' => '10115', 'country' => 'DE']);

        $rule = new ValidAddress(['country' => 'DE', 'zip' => '10115', 'city' => 'Berlin']);

        $this->assertTrue($rule->passes('address', $city));
    }

    /** @test */
    public function it_fails_for_non_existing_address()
    {
        $rule = new ValidAddress(['country' => 'DE', 'zip' => '99999', 'city' => 'Unknown']);

        $this->assertFalse($rule->passes('address', null));
    }
}
