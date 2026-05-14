<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Tambah kolom image_url untuk link eksternal (data lama)
            $table->string('image_url')->nullable()->after('description');
            
            // Tambah kolom image_path untuk upload file (data baru)
            $table->string('image_path')->nullable()->after('image_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            // Hapus kolom jika rollback
            $table->dropColumn(['image_url', 'image_path']);
        });
    }
};