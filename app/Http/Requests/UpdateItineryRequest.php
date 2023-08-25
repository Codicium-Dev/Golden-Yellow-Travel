<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItineryRequest extends FormRequest
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
            "name" => "required|unique:itineries,name",
            "description" => "nullable",
            "meal" => "nullable",
            "accommodation" => "nullable",
            "note" => "nullable",
            "itinerary_photo" => "nullable",
        ];
    }
}
