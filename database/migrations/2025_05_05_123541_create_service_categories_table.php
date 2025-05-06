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
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            // Optional relationship to homepage if categories are specific to it
            $table->foreignId('homepage_id')->nullable()->constrained('homepages')->onDelete('cascade');

            $table->string('name'); // Category Name (e.g., "Digital Marketing")
            $table->text('description')->nullable(); // Category Description (Optional)
            $table->string('image_url')->nullable(); // Category Image URL (Optional)
            $table->integer('order')->nullable(); // Optional field for ordering categories
            $table->boolean('is_active')->default(true); // Optional field to mark category as active/inactive
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};
