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
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('kode_barang')->nullable()->after('pernyataan_lartas');
            $table->text('spesifikasi_lain')->nullable()->after('kode_barang');
            $table->enum('kondisi_barang', ['barang_baru', 'barang_bekas'])->nullable()->after('spesifikasi_lain');
            $table->string('negara_asal', 10)->nullable()->after('kondisi_barang');
            $table->decimal('berat_bersih', 8, 3)->nullable()->after('negara_asal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn([
                'kode_barang',
                'spesifikasi_lain',
                'kondisi_barang',
                'negara_asal',
                'berat_bersih'
            ]);
        });
    }
};
