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
        Schema::create('pages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->string('slug')->unique(); // Unique slug (e.g., 'about-us')
            $table->string('meta_title'); // SEO Meta Title
            $table->text('meta_description'); // SEO Meta Description
            $table->text('seo_keywords')->nullable(); // SEO Keywords (Optional)

            $table->string('hero_heading'); // Hero Section Heading
            $table->text('hero_subheading'); // Hero Section Subheading

            $table->string('trusted_partner_heading')->nullable(); // "Your Trusted Partner" Heading
            $table->text('trusted_partner_content')->nullable(); // "Your Trusted Partner" Content
            $table->text('trusted_partner_quote')->nullable(); // Trusted Partner Quote
            $table->string('trusted_partner_quote_author')->nullable(); // Trusted Partner Quote Author
            $table->string('trusted_partner_quote_author_title')->nullable(); // Trusted Partner Quote Author Title
            $table->string('trusted_partner_image_url')->nullable(); // Trusted Partner Image URL

            // Note: Stats Items are in a separate table (stats_items)
            // Note: Value Items are in a separate table (value_items)

            $table->string('values_heading')->nullable(); // "Our Values" Heading

            $table->string('main_image_url')->nullable(); // Main Image URL (for the large image section)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
