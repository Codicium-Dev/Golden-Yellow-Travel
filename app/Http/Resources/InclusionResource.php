<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InclusionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "tour_name" => $this->tour->name,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "meal" => $this->meal,
            "category" => $this->category,
            "price" => $this->price,
            "sale_price" => $this->sale_price,
            "private_price" => $this->private_price,
            "sale_private_price" => $this->sale_private_price,
            "created_at" => $this->created_at->format('d m Y'),
            "updated_at" => $this->updated_at->format('d m Y')
        ];
    }
}
