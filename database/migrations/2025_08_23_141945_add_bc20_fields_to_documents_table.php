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
            $table->string('nomor_aju')->nullable();
            $table->string('pelabuhan_tujuan')->nullable();
            $table->string('kantor_pabean')->nullable();
            $table->string('jenis_pib')->nullable();
            $table->string('jenis_impor')->nullable();
            $table->string('cara_pembayaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'nomor_aju',
                'pelabuhan_tujuan', 
                'kantor_pabean',
                'jenis_pib',
                'jenis_impor',
                'cara_pembayaran'
            ]);
        });
    }
};
