<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class HomepagesResource extends JsonResource
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
            'featured_services_heading' => $this->featured_services_heading,
            'featured_services_subheading' => $this->featured_services_subheading,
            'testimonial_heading' => $this->testimonial_heading,
            'testimonial_content' => $this->testimonial_content,
            'testimonial_author' => $this->testimonial_author,
            'testimonial_author_title' => $this->testimonial_author_title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
