<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'seri',
        'pos_tarif_hs',
        'uraian_jenis_barang',
        'nilai_barang',
        'jumlah_satuan',
        'jenis_satuan',
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
        'nilai_pabean_rupiah',
        'jumlah_kemasan',
        'dokumen_fasilitas_lartas',
        'bm_rate',
        'bm_type',
        'bm_amount',
        'ppn_rate',
        'ppn_type', 
        'ppn_amount',
        'pph_rate',
        'pph_type',
        'pph_amount',
    ];

    protected $casts = [
        'nilai_barang' => 'decimal:2',
        'jumlah_satuan' => 'decimal:2',
        'seri' => 'integer',
        'berat_bersih' => 'decimal:3',
        'jumlah_kemasan' => 'decimal:2',
        'fob' => 'decimal:2',
        'freight' => 'decimal:2',
        'asuransi' => 'decimal:2',
        'harga_per_satuan' => 'decimal:2',
        'nilai_pabean_rupiah' => 'decimal:2',
        'bm_rate' => 'decimal:2',
        'bm_amount' => 'string',
        'ppn_rate' => 'decimal:2',
        'ppn_amount' => 'string',
        'pph_rate' => 'decimal:2',
        'pph_amount' => 'string',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($barang) {
            // Get the next seri number for this document
            $lastSeri = static::where('document_id', $barang->document_id)
                             ->max('seri');
            $barang->seri = $lastSeri ? $lastSeri + 1 : 1;
        });
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
