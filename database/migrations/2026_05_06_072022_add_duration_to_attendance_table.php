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
        Schema::table('attendances', function (Blueprint $table) {
            // Cek apakah kolom 'duration' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('attendances', 'duration')) {
                $table->time('duration')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Cek apakah kolom ada sebelum mencoba menghapusnya
            if (Schema::hasColumn('attendances', 'duration')) {
                $table->dropColumn('duration');
            }
        });
    }
};