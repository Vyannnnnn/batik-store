<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();
            
            // Apa Itu Batikura
            $table->string('apa_title')->nullable();
            $table->text('apa_description')->nullable();
            $table->string('apa_image')->nullable();
            
            // Mengapa Harus Batikura
            $table->string('mengapa_title')->nullable();
            $table->text('mengapa_description')->nullable();
            $table->string('mengapa_image')->nullable();
            $table->text('mengapa_poin_1')->nullable();
            $table->text('mengapa_poin_2')->nullable();
            $table->text('mengapa_poin_3')->nullable();
            
            // Cerita Kami
            $table->string('cerita_title')->nullable();
            $table->text('cerita_paragraf_1')->nullable();
            $table->text('cerita_paragraf_2')->nullable();
            $table->text('cerita_paragraf_3')->nullable();
            $table->string('cerita_hashtag')->nullable();
            
            // Proses Pembuatan
            $table->string('proses_title')->nullable();
            $table->text('proses_1')->nullable();
            $table->text('proses_2')->nullable();
            $table->text('proses_3')->nullable();
            $table->text('proses_4')->nullable();
            
            // Nilai-Nilai
            $table->string('nilai_title')->nullable();
            $table->text('nilai_1')->nullable();
            $table->text('nilai_2')->nullable();
            $table->text('nilai_3')->nullable();
            $table->text('nilai_4')->nullable();
            $table->text('nilai_5')->nullable();
            $table->text('nilai_6')->nullable();
            
            // Book Now
            $table->string('book_title')->nullable();
            $table->text('book_description')->nullable();
            $table->string('book_link')->nullable();
            $table->string('book_button_text')->nullable();
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_settings');
    }
};