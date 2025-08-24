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
            $table->string('pernyataan_tempat')->nullable();
            $table->date('pernyataan_tanggal')->nullable();
            $table->string('pernyataan_nama')->nullable();
            $table->string('pernyataan_jabatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'pernyataan_tempat',
                'pernyataan_tanggal', 
                'pernyataan_nama',
                'pernyataan_jabatan'
            ]);
        });
    }
};
