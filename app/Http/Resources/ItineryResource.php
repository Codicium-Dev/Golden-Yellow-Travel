<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItineryResource extends JsonResource
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
            "name" => $this->name,
            "tour_id" => $this->tour_id,
            "tour_name" => $this->tour->name,
            "description" => $this->description,
            "meal" => $this->meal,
            "accommodation" => $this->accommodation,
            "note" => $this->note,
            "itinerary_photo" => $this->itinerary_photo,
            "created_at" => $this->created_at->format('d m Y'),
            "updated_at" => $this->updated_at->format('d m Y')
        ];
    }
}
