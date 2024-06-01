<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateHotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'price_per_night' => 'required|numeric|min:0',
            'facilities' => 'array',
            'facilities.*.name' => 'required|string|max:255',
            'facilities.*.capacity' => 'required|integer|min:1',
        ];
    }
}
