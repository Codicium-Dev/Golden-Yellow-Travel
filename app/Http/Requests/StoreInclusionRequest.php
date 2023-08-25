<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInclusionRequest extends FormRequest
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
            "tour_id" => "required",
            'start_date' => 'nullable',
            "end_date" => 'nullable',
            "category" => 'nullable',
            "price" => 'nullable',
            "private_price" => 'nullable',
            "sale_private_price" => 'nullable',
        ];
    }
}
