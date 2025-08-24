<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemasan extends Model
{
    use HasFactory;

    protected $table = 'kemasan';

    protected $fillable = [
        'document_id',
        'seri',
        'jumlah',
        'jenis',
        'merek'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
