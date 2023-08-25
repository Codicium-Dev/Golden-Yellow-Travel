<?php

namespace App\Http\Requests;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */


    public function rules(): array
    {
        $countryIds = implode(',', Country::all()->pluck('id')->toArray());

        return [
            "name" => "required",
            'country_id' => "in:$countryIds",
            "city_photo" => "nullable"
        ];
    }
}
