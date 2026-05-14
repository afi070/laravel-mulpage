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
        Schema::table('articles', function (Blueprint $table) {
            // Hapus kolom image yang lama
            if (Schema::hasColumn('articles', 'image')) {
                $table->dropColumn('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Tambahkan kembali kolom image jika rollback
            $table->string('image')->nullable()->after('description');
        });
    }
};