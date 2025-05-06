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
        Schema::create('service_features', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Foreign key to services table
            $table->string('feature_heading'); // Feature Item Heading
            $table->text('feature_content'); // Feature Item Content
            $table->integer('order')->nullable(); // Optional field for ordering features
            $table->boolean('is_active')->default(true); // Optional field for feature status
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_features');
    }
};
