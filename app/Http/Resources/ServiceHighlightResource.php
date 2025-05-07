<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceHighlightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'service_category_id' => $this->service_category_id,
            'service_id' => $this->service_id,
            'title' => $this->title,
            'description' => $this->description,
            'link_url' => $this->link_url,
            'order' => $this->order,
            'is_active' => $this->is_active,
            'service' => $this->when($this->service, new ServiceResource($this->service)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
