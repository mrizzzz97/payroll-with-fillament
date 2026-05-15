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
        // Cek dulu apakah tabel 'leaves' belum ada
        if (!Schema::hasTable('leaves')) {
            Schema::create('leaves', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->date('start_date');
                $table->date('end_date');
                $table->text('reason');
                $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
                $table->text('notes')->nullable(); 
                $table->timestamps();
            });
        } else {
            // Jika tabel SUDAH ADA, pastikan kolom 'notes' diubah jadi nullable
            // Ini untuk memperbaiki error "doesn't have a default value" yang pertama kali muncul
            Schema::table('leaves', function (Blueprint $table) {
                if (Schema::hasColumn('leaves', 'notes')) {
                    $table->text('notes')->nullable()->change();
                } else {
                    $table->text('notes')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};