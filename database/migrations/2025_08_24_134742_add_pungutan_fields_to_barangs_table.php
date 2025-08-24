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
            // BM (Bea Masuk) fields
            $table->decimal('bm_rate', 5, 2)->nullable()->after('dokumen_fasilitas_lartas');
            $table->string('bm_type')->nullable()->after('bm_rate');
            $table->string('bm_amount')->nullable()->after('bm_type');
            
            // PPN fields
            $table->decimal('ppn_rate', 5, 2)->default(12.00)->after('bm_amount');
            $table->string('ppn_type')->nullable()->after('ppn_rate');
            $table->string('ppn_amount')->nullable()->after('ppn_type');
            
            // PPH fields
            $table->decimal('pph_rate', 5, 2)->default(2.50)->after('ppn_amount');
            $table->string('pph_type')->nullable()->after('pph_rate');
            $table->string('pph_amount')->nullable()->after('pph_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn([
                'bm_rate', 'bm_type', 'bm_amount',
                'ppn_rate', 'ppn_type', 'ppn_amount', 
                'pph_rate', 'pph_type', 'pph_amount'
            ]);
        });
    }
};
