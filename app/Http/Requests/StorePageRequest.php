<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePageRequest extends FormRequest
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
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'slug' => 'required|unique:pages,slug|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
            'seo_keywords' => 'nullable|max:255',
            'hero_heading' => 'required|max:255',
            'hero_subheading' => 'required|max:255',
            'main_image_url' => 'required|url|max:255',
        ];
    }
}
