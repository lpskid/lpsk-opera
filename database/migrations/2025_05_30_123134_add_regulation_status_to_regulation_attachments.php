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
        Schema::table('regulation_attachments', function (Blueprint $table) {
            $table->enum('regulation_status', [
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
            'analisa_evaluasi'
        ])->nullable()->after('regulation_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regulation_attachments', function (Blueprint $table) {
            //
        });
    }
};
