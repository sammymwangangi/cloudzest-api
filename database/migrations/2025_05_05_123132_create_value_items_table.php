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
        Schema::create('value_items', function (Blueprint $table) {
            $table->id(); // Auto-incrementing Primary Key
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade'); // Foreign key to pages
            $table->string('heading'); // Value Item Heading
            $table->text('description'); // Value Item Description
            $table->integer('order')->nullable(); // Optional field for ordering values
            $table->boolean('is_active')->default(true); // Optional field to mark values as active or inactive
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('value_items');
    }
};
