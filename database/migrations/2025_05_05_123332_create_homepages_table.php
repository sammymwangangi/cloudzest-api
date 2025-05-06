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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->string('slug')->unique(); // Unique slug (e.g., 'home')
            $table->string('meta_title'); // SEO Meta Title
            $table->text('meta_description'); // SEO Meta Description
            $table->text('seo_keywords')->nullable(); // SEO Keywords (Optional)

            $table->string('hero_heading'); // Hero Section Heading
            $table->text('hero_subheading'); // Hero Section Subheading
            $table->string('hero_cta_button_1_text'); // Hero Section CTA Button 1 Text
            $table->string('hero_cta_button_1_link'); // Hero Section CTA Button 1 Link
            $table->string('hero_cta_button_2_text')->nullable(); // Hero Section CTA Button 2 Text (Optional)
            $table->string('hero_cta_button_2_link')->nullable(); // Hero Section CTA Button 2 Link (Optional)
            $table->string('hero_image_url')->nullable(); // Hero Section Image URL (Optional)

            $table->string('about_heading')->nullable(); // "About Something" Heading (Optional)
            $table->text('about_content')->nullable(); // "About Something" Content (Optional)
            $table->string('about_image_url')->nullable(); // "About Something" Image URL (Optional)

            $table->string('services_overview_heading')->nullable(); // Service Overview Heading (Optional)
            $table->text('services_overview_description')->nullable(); // Service Overview Description (Optional)

            $table->string('why_choose_us_heading')->nullable(); // "Why Choose Us" Heading (Optional)
            // Note: Features List items are in a separate table (feature_items)

            $table->text('testimonial_quote')->nullable(); // Testimonial/Quote (Optional)
            $table->string('testimonial_author')->nullable(); // Testimonial Author (Optional)
            $table->string('testimonial_author_title')->nullable(); // Testimonial Author Title (Optional)
            $table->string('testimonial_image_url')->nullable(); // Testimonial Image URL (Optional)

            $table->string('cta_heading')->nullable(); // Final CTA Heading (Optional)
            $table->text('cta_subheading')->nullable(); // Final CTA Subheading (Optional)
            $table->string('cta_button_text')->nullable(); // Final CTA Button Text (Optional)
            $table->string('cta_button_link')->nullable(); // Final CTA Button Link (Optional)
            $table->string('cta_background_image_url')->nullable(); // Final CTA Background Image URL (Optional)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
