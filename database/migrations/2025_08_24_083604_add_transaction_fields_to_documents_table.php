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
            // Transaction/Harga fields
            $table->string('jenis_valuta')->nullable();
            $table->decimal('ndpbm', 15, 4)->nullable();
            $table->string('jenis_transaksi')->nullable();
            $table->string('harga_barang_incoterm')->nullable(); // CIF, FOB, etc.
            $table->decimal('harga_barang_nilai', 15, 2)->nullable();
            $table->decimal('nilai_pabean', 15, 2)->nullable();
            
            // Biaya Lainnya fields
            $table->decimal('biaya_penambah', 15, 2)->nullable()->default(0);
            $table->decimal('biaya_pengurang', 15, 2)->nullable()->default(0);
            $table->decimal('freight', 15, 2)->nullable()->default(0);
            $table->string('asuransi_jenis')->nullable(); // LN or DN
            $table->decimal('asuransi_nilai', 15, 2)->nullable()->default(0);
            $table->decimal('voluntary_declaration', 15, 2)->nullable()->default(0);
            
            // Berat fields
            $table->decimal('berat_kotor', 10, 4)->nullable();
            $table->decimal('berat_bersih', 10, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // Drop transaction fields
            $table->dropColumn([
                'jenis_valuta',
                'ndpbm',
                'jenis_transaksi',
                'harga_barang_incoterm',
                'harga_barang_nilai',
                'nilai_pabean',
                'biaya_penambah',
                'biaya_pengurang',
                'freight',
                'asuransi_jenis',
                'asuransi_nilai',
                'voluntary_declaration',
                'berat_kotor',
                'berat_bersih'
            ]);
        });
    }
};
