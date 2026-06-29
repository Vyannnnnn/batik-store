<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('about_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('about_settings', 'cerita_timeline_1')) {
                $table->text('cerita_timeline_1')->nullable()->after('cerita_paragraf_3');
            }
            if (!Schema::hasColumn('about_settings', 'cerita_timeline_2')) {
                $table->text('cerita_timeline_2')->nullable()->after('cerita_timeline_1');
            }
            if (!Schema::hasColumn('about_settings', 'cerita_timeline_3')) {
                $table->text('cerita_timeline_3')->nullable()->after('cerita_timeline_2');
            }
            if (!Schema::hasColumn('about_settings', 'cerita_timeline_4')) {
                $table->text('cerita_timeline_4')->nullable()->after('cerita_timeline_3');
            }
        });
    }

    public function down()
    {
        Schema::table('about_settings', function (Blueprint $table) {
            $table->dropColumn([
                'cerita_timeline_1',
                'cerita_timeline_2',
                'cerita_timeline_3',
                'cerita_timeline_4',
            ]);
        });
    }
};