<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambah
            if (!Schema::hasColumn('articles', 'image_url')) {
                $table->string('image_url')->nullable()->after('description');
            }
            
            if (!Schema::hasColumn('articles', 'image_path')) {
                $table->string('image_path')->nullable()->after('image_url');
            }
        });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['image_url', 'image_path']);
        });
    }
};