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
        Schema::create('stats_items', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade'); // Foreign key to pages
            $table->string('number'); // The number or text (e.g., '50+')
            $table->string('label'); // The label below the number (e.g., 'Awards')
            $table->integer('order')->nullable(); // Optional field for ordering stats
            $table->boolean('is_active')->default(true); // Optional field to mark as active or inactive

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats_items');
    }
};
