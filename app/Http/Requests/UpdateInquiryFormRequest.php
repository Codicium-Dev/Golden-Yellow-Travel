<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInquiryFormRequest extends FormRequest
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
            'travel_month' => "required",
            'travel_year' => "required",
            'stay_days' => "required",
            'budget' => "required",
            'adult_count' => "required",
            'child_count' => "required",
            'interest' => "required",
            'destinations' => "required",
            'f_name' => "required",
            'l_name' => "nullable",
            'email' => "required",
            'phone' => "required",
            'own_country' => "nullable",
            'accommodation' => "nullable",
            'how_u_know' => "nullable",
            'other_information' => "nullable",
            'special_note' => "nullable",
        ];
    }
}
