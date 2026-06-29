<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            
            // Header
            $table->string('header_title')->nullable();
            $table->string('header_subtitle')->nullable();
            $table->text('header_description')->nullable();
            
            // Alamat
            $table->string('address_title')->nullable();
            $table->text('address')->nullable();
            
            // Instagram
            $table->string('instagram_title')->nullable();
            $table->string('instagram_username')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('instagram_description')->nullable();
            
            // Google Form
            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();
            $table->string('form_button_text')->nullable();
            $table->string('form_link')->nullable();
            $table->string('form_footer_text')->nullable();
            
            // Maps
            $table->string('maps_title')->nullable();
            $table->string('maps_subtitle')->nullable();
            $table->string('maps_embed')->nullable();
            $table->string('maps_footer')->nullable();
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_settings');
    }
};