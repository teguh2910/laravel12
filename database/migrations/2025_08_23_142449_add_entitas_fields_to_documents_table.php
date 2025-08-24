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
            // Importir fields
            $table->string('importir_npwp')->nullable();
            $table->string('importir_nitku')->nullable();
            $table->string('importir_nama')->nullable();
            $table->text('importir_alamat')->nullable();
            $table->string('importir_api')->nullable();
            
            // NPWP Pemusatan fields
            $table->string('pemusatan_npwp')->nullable();
            $table->string('pemusatan_nitku')->nullable();
            $table->string('pemusatan_nama')->nullable();
            $table->text('pemusatan_alamat')->nullable();
            
            // Pengirim fields
            $table->string('pengirim_nama')->nullable();
            $table->text('pengirim_alamat')->nullable();
            $table->string('pengirim_negara')->nullable();
            
            // Pemilik Barang fields
            $table->string('pemilik_npwp')->nullable();
            $table->string('pemilik_nitku')->nullable();
            $table->string('pemilik_nama')->nullable();
            $table->text('pemilik_alamat')->nullable();
            
            // Penjual fields
            $table->string('penjual_nama')->nullable();
            $table->text('penjual_alamat')->nullable();
            $table->string('penjual_negara')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'importir_npwp', 'importir_nitku', 'importir_nama', 'importir_alamat', 'importir_api',
                'pemusatan_npwp', 'pemusatan_nitku', 'pemusatan_nama', 'pemusatan_alamat',
                'pengirim_nama', 'pengirim_alamat', 'pengirim_negara',
                'pemilik_npwp', 'pemilik_nitku', 'pemilik_nama', 'pemilik_alamat',
                'penjual_nama', 'penjual_alamat', 'penjual_negara'
            ]);
        });
    }
};
