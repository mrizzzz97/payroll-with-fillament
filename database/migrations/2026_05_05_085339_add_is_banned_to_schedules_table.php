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
        Schema::table('schedules', function (Blueprint $table) {
            // Cek apakah kolom 'is_banned' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('schedules', 'is_banned')) {
                $table->boolean('is_banned')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Cek apakah kolom ada sebelum menghapusnya
            if (Schema::hasColumn('schedules', 'is_banned')) {
                $table->dropColumn('is_banned');
            }
        });
    }
};