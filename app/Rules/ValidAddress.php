<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\City;

class ValidAddress implements Rule
{
    private array $addresses;

    public function __construct($address)
    {
        $this->addresses = $address;
    }

    public function passes($attribute, $value)
    {
        foreach ($this->addresses as $address)
        return City::where('country', $address['country'])
            ->where('zipCode', $address['zip'])
            ->where('name', $address['city'])
            ->exists();
    }

    public function message()
    {
        return 'The address is invalid.';
    }
}
