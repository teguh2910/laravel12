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
            // Lartas fields
            $table->boolean('bukan_lartas')->default(false)->after('jenis_satuan');
            $table->enum('pernyataan_lartas', ['terkena', 'tidak_terkena'])->nullable()->after('bukan_lartas');
            
            // Additional product information
            $table->string('kode_barang')->nullable()->after('pernyataan_lartas');
            $table->string('spesifikasi_lain')->nullable()->after('kode_barang');
            $table->enum('kondisi_barang', ['barang_baru', 'barang_bekas'])->nullable()->after('spesifikasi_lain');
            $table->string('negara_asal', 10)->nullable()->after('kondisi_barang');
            $table->decimal('berat_bersih', 10, 3)->nullable()->after('negara_asal');
            $table->string('kemasan')->nullable()->after('berat_bersih');
            
            // Financial fields
            $table->decimal('fob', 15, 2)->nullable()->after('kemasan');
            $table->decimal('freight', 15, 2)->default(0)->after('fob');
            $table->decimal('asuransi', 15, 2)->default(0)->after('freight');
            $table->decimal('harga_per_satuan', 15, 2)->nullable()->after('asuransi');
            $table->decimal('nilai_pabean_rupiah', 15, 2)->nullable()->after('harga_per_satuan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn([
                'bukan_lartas',
                'pernyataan_lartas',
                'kode_barang',
                'spesifikasi_lain',
                'kondisi_barang',
                'negara_asal',
                'berat_bersih',
                'kemasan',
                'fob',
                'freight',
                'asuransi',
                'harga_per_satuan',
                'nilai_pabean_rupiah'
            ]);
        });
    }
};
