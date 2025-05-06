<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->string('slug')->unique(); // Unique slug for the URL
            $table->string('meta_title'); // SEO Meta Title
            $table->text('meta_description'); // SEO Meta Description
            $table->text('seo_keywords')->nullable(); // SEO Keywords (Optional)

            $table->string('hero_heading'); // Hero Section Heading
            $table->text('hero_subheading'); // Hero Section Subheading
            $table->string('hero_cta_button_text'); // Hero Section CTA Button Text
            $table->string('hero_cta_button_link'); // Hero Section CTA Button Link
            $table->string('hero_image_url')->nullable(); // Hero Section Image URL (Optional)

            $table->string('introduction_heading'); // Introduction Section Heading
            $table->text('introduction_content'); // Introduction Section Content

            // Note: Key Features are in a separate table (service_features)

            $table->text('testimonial_or_quote')->nullable(); // Testimonial/Quote (Optional)
            $table->string('testimonial_author')->nullable(); // Testimonial Author (Optional)

            $table->boolean('published')->default(false); // Published status

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
