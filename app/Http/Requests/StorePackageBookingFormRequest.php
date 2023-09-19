<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageBookingFormRequest extends FormRequest
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
        return [
            'package_tour_id' => "required",
            'adult' => "required",
            'child' => "nullable",
            'infants' => "nullable",
            'date' => "required",
            'arrival_airport' => "required",
            'tour_type' => "required",
            'accommodation' => "required",
            'special_req' => "required",
            'gender' => "required",
            'full_name' => "required",
            'email' => "required",
            'phone' => "required",
            'country' => "required",
            'city' => "required",
            'social_media' => "required",
        ];
    }
}
