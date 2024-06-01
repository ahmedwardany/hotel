<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'city_id' => 'sometimes|required|exists:cities,id',
            'price_per_night' => 'sometimes|required|numeric|min:0',
            // 'facilities' => 'sometimes|array',
            // 'facilities.*.name' => 'required_with:facilities|string|max:255',
            // 'facilities.*.capacity' => 'required_with:facilities|integer|min:1',
        ];
    }
}
