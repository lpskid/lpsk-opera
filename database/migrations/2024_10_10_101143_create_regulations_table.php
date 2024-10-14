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
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('determination_date')->nullable();
            $table->string('determination_location')->nullable();
            $table->date('invitation_date');
            $table->text('content');
            $table->enum('status', ['pengusulan', 'penyusunan_pembahasan', 'partisipasi_publik', 'persetujuan_pimpinan', 'penyelarasan', 'penetapan', 'pengundangan_peraturan', 'penyusunan_informasi', 'penyebarluasan', 'laporan_proses', 'analisa_evaluasi'])->default('pengusulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulations');
    }
};
