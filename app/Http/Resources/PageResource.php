<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PageResource extends JsonResource
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
            'slug' => Str::slug($this->slug),
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'seo_keywords' => $this->seo_keywords,
            'hero_heading' => $this->hero_heading,
            'hero_subheading' => $this->hero_subheading,
            'main_image_url' => $this->main_image_url,
            'stats_items' => StatsItemResource::collection($this->whenLoaded('statsItems')),
            'value_items' => ValueItemResource::collection($this->whenLoaded('valueItems')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
