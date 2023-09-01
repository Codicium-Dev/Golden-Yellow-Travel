<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageInclusionResource extends JsonResource
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
            "package_tour_id" => $this->package_id,
            "package_tour_name" => $this->packageTour->name,
            "meals" => $this->meals,
            "transport" => $this->transport,
            "accommodation" => $this->accommodation,
            "included_activities" => $this->included_activities,
            "created_at" => $this->created_at->format('d m Y'),
            "updated_at" => $this->updated_at->format('d m Y')
        ];
    }
}
