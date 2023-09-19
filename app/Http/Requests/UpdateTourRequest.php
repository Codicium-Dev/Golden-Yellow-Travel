<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
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
            "name" => "required",
            'start_date' => "nullable",
            'end_date' => "nullable",
            "package_name" => "nullable",
            "overview" => "nullable",
            "price" => "nullable",
            "sale_price" => "nullable",
            "location" => "nullable",
            "departure" => "nullable",
            "theme" => "nullable",
            "duration" => "nullable",
            "rating" => "nullable",
            "type" => "nullable",
            "style" => "nullable",
            "for_whom" => "nullable",
            "tour_photo" => "nullable"
        ];
    }
}
