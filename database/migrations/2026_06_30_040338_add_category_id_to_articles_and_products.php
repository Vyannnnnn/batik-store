<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah category_id ke articles
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'category_id')) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories')
                    ->onDelete('set null');
            }
        });

        // Tambah category_id ke products
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->constrained('categories')
                    ->onDelete('set null');
            }
        });

        // Hapus column category (enum) dari articles jika ada
        Schema::table('articles', function (Blueprint $table) {
            if (Schema::hasColumn('articles', 'category')) {
                $table->dropColumn('category');
            }
        });

        // Hapus column category (enum) dari galleries jika ada
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};