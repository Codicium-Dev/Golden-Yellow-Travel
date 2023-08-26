<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsContentResource extends JsonResource
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
            "news_id" => $this->news_id,
            "news_name" => $this->new,
            "title" => $this->title,
            "subtitle" => $this->subtitle,
            "content" => $this->content,
            "content_photo" => $this->content_photo,
            "created_at" => $this->created_at->format('d m Y'),
            "updated_at" => $this->updated_at->format('d m Y')
        ];
    }
}
