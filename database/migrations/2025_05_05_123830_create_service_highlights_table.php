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
        Schema::create('service_highlights', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->foreignId('service_category_id')->constrained('service_categories')->onDelete('cascade'); // Foreign key to service_categories

            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null'); // Foreign key to services (Optional, set null if service is deleted)
            $table->string('title'); // Highlight Title (e.g., "SEO Service")
            $table->text('description'); // Highlight Description
            $table->string('link_url')->nullable(); // Direct link URL (Alternative if no service_id)
            $table->integer('order')->nullable(); // Optional field for ordering highlights
            $table->boolean('is_active')->default(true); // Flag to indicate if the highlight is active

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_highlights');
    }
};
