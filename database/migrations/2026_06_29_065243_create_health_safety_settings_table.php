<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('health_safety_settings', function (Blueprint $table) {
            $table->id();
            
            // Section Header
            $table->string('title')->nullable();
            $table->string('badge')->nullable();
            $table->text('description')->nullable();
            
            // Image
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();
            
            // Features (list)
            $table->json('features')->nullable(); // ["Non-porous", "Lead-free", "Anti Bakteri", "Mudah Dibersihkan"]
            
            // Button
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('health_safety_settings');
    }
};