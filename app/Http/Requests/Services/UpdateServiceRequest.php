<?php

namespace App\Http\Requests\Services;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('slug')) {
            $this->merge([
                'slug' => Str::slug($this->slug),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'slug' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'seo_keywords' => 'nullable|max:255',
            'hero_heading' => 'nullable|max:255',
            'hero_subheading' => 'nullable|max:255',
            'hero_cta_button_text' => 'nullable|max:255',
            'hero_cta_button_link' => 'nullable|max:255',
            'hero_image_url' => 'nullable|url|max:255',
            'introduction_heading' => 'nullable|max:255',
            'introduction_content' => 'nullable|max:255',
            'testimonial_or_quote' => 'nullable|max:255',
            'testimonial_author' => 'nullable|max:255',
            'published' => 'nullable',
        ];
    }
}
