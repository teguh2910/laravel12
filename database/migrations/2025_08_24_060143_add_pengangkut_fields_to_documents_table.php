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
        Schema::table('documents', function (Blueprint $table) {
            // BC 1.1 fields
            $table->string('nomor_tutup_pu')->nullable();
            $table->string('nomor_pos')->nullable();
            
            // Pengangkutan fields
            $table->string('cara_pengangkutan')->nullable();
            $table->string('nama_sarana_angkut')->nullable();
            $table->string('nomor_voy')->nullable();
            $table->string('bendera')->nullable();
            $table->date('tanggal_tiba')->nullable();
            
            // Pelabuhan & Tempat Penimbunan fields
            $table->string('pelabuhan_muat')->nullable();
            $table->string('pelabuhan_transit')->nullable();
            // pelabuhan_tujuan already exists
            $table->string('tempat_penimbunan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_tutup_pu',
                'nomor_pos',
                'cara_pengangkutan',
                'nama_sarana_angkut',
                'nomor_voy',
                'bendera',
                'tanggal_tiba',
                'pelabuhan_muat',
                'pelabuhan_transit',
                'tempat_penimbunan'
            ]);
        });
    }
};
