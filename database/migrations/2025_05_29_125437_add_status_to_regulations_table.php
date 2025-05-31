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
        Schema::table('regulations', function (Blueprint $table) {
             $table->enum('status', [
                'pending',
                'pengusulan',
                'penyusunan_pembahasan',
                'partisipasi_publik',
                'persetujuan_pimpinan',
                'penyelarasan',
                'penetapan',
                'pengundangan_peraturan',
                'penyusunan_informasi',
                'penyebarluasan',
                'laporan_proses',
                'analisa_evaluasi',
            ])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regulations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
