<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetiKemas extends Model
{
    use HasFactory;

    protected $table = 'peti_kemas';

    protected $fillable = [
        'document_id',
        'seri',
        'nomor',
        'ukuran',
        'jenis_muatan',
        'tipe'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
