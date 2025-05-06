<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductResource extends JsonResource
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
            'hero_cta_button_text' => $this->hero_cta_button_text,
            'hero_cta_button_link' => $this->hero_cta_button_link,
            'hero_image_url' => $this->hero_image_url,
            'introduction_heading' => $this->introduction_heading,
            'introduction_content' => $this->introduction_content,
            'testimonial_or_quote' => $this->testimonial_or_quote,
            'testimonial_author' => $this->testimonial_author,
            'published' => $this->published,
            'features' => ProductFeatureResource::collection($this->whenLoaded('features')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
