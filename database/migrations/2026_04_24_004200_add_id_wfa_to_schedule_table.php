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
            // Cek dulu apakah kolom 'is_wfa' BELUM ada sebelum menambahkannya
            if (!Schema::hasColumn('schedules', 'is_wfa')) {
                $table->boolean('is_wfa')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Cek dulu apakah kolomnya ADA sebelum mencoba menghapusnya
            if (Schema::hasColumn('schedules', 'is_wfa')) {
                $table->dropColumn('is_wfa');
            }
        });
    }
};