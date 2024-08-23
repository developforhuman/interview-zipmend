<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidAddress;

class CalculatePriceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'addresses' => 'required|array|min:2',
            'addresses.*' => ['required', new ValidAddress($this->input('addresses'))],
        ];
    }

    public function messages()
    {
        return [
            'addresses.required' => 'The addresses field is required.',
            'addresses.array' => 'The addresses field must be an array.',
            'addresses.min' => 'There must be at least two addresses.',
            'addresses.*.required' => 'Each address must be a valid city in the database.',
        ];
    }
}
