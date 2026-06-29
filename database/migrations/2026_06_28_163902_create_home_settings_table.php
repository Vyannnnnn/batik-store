<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_badge')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();
            
            // Product
            $table->string('product_section_label')->nullable();
            $table->string('product_section_title')->nullable();
            $table->string('product_title')->nullable();
            $table->string('product_motif')->nullable();
            $table->text('product_description')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_booking_link')->nullable();
            $table->string('product_badge')->nullable();
            
            // Dinoyo
            $table->string('dinoyo_section_label')->nullable();
            $table->string('dinoyo_section_title')->nullable();
            $table->text('dinoyo_section_description')->nullable();
            
            // Instagram
            $table->string('instagram_title')->nullable();
            $table->text('instagram_subtitle')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('instagram_url')->nullable();
            $table->boolean('instagram_is_active')->default(true);
            
            // Map
            $table->string('map_title')->nullable();
            $table->text('map_address')->nullable();
            $table->string('map_url')->nullable();
            $table->string('map_button_text')->nullable();
            $table->text('map_description')->nullable();
            $table->string('map_operational_hours')->nullable();
            $table->string('map_closed_day')->nullable();
            $table->boolean('map_is_active')->default(true);
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_settings');
    }
};