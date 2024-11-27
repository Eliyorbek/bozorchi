<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $rules =  [
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'slug'=>'required'
        ];

        if ($this->isMethod('post')){
            $rules['image'] = 'required|mimes:jpeg,png,jpg,svg'. $rules['image'];
        }

        return $rules;
    }
}
