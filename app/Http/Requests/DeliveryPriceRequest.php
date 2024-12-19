<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryPriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'min_km' => 'required|numeric|min:0',
            'min_price' => 'required|numeric|min:0',
            'max_km' => 'required|numeric|min:0',
            'max_price' => 'required|numeric|min:0',
            'standart_km' => 'required|numeric|min:0',
            'standart_price' => 'required|numeric|min:0',
        ];
    }
}
