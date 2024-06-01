<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchHotelRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'country_code' => 'sometimes|string|max:3',
            'city' => 'sometimes|string|max:255',
            'price_per_night' => 'sometimes|numeric',
            'sort_by' => 'sometimes|string|in:name,city,price_per_night',
        ];
    }
}
