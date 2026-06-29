<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            // Hapus field maps (akan diambil dari home_settings)
            $table->dropColumn([
                'maps_title',
                'maps_subtitle',
                'maps_embed',
                'maps_footer',
            ]);
            
            // Hapus form_link (akan diambil dari home_settings product_booking_link)
            $table->dropColumn('form_link');
        });
    }

    public function down(): void
    {
        Schema::table('contact_settings', function (Blueprint $table) {
            $table->string('maps_title')->nullable();
            $table->string('maps_subtitle')->nullable();
            $table->string('maps_embed')->nullable();
            $table->string('maps_footer')->nullable();
            $table->string('form_link')->nullable();
        });
    }
};