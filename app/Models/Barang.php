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
    ];

    protected $casts = [
        'nilai_barang' => 'decimal:2',
        'jumlah_satuan' => 'decimal:2',
        'seri' => 'integer',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
