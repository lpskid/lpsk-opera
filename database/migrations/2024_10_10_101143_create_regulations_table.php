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
            $table->string('number');
            $table->text('jdih_link');
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('date')->default(date('Y-m-d'));
            $table->text('information');
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