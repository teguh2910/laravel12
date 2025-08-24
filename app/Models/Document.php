<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pengajuan',
        'deskripsi',
        'jenis_dokumen',
        'jenis_pemberitahuan',
        'asal_barang',
        'tujuan_barang',
        'tanggal_pengajuan',
        'status',
        'nomor_aju',
        'pelabuhan_tujuan',
        'kantor_pabean',
        'jenis_pib',
        'jenis_impor',
        'cara_pembayaran',
        'dokumen_lampiran', // JSON field for document attachments
        // Importir fields
        'importir_npwp',
        'importir_nitku',
        'importir_nama',
        'importir_alamat',
        'importir_api',
        // NPWP Pemusatan fields
        'pemusatan_npwp',
        'pemusatan_nitku',
        'pemusatan_nama',
        'pemusatan_alamat',
        // Pengirim fields
        'pengirim_nama',
        'pengirim_alamat',
        'pengirim_negara',
        // Pemilik Barang fields
        'pemilik_npwp',
        'pemilik_nitku',
        'pemilik_nama',
        'pemilik_alamat',
        // Penjual fields
        'penjual_nama',
        'penjual_alamat',
        'penjual_negara',
        // Pengangkut fields
        'nomor_tutup_pu',
        'nomor_pos',
        'cara_pengangkutan',
        'nama_sarana_angkut',
        'nomor_voy',
        'bendera',
        'tanggal_tiba',
        'pelabuhan_muat',
        'pelabuhan_transit',
        'tempat_penimbunan'
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'dokumen_lampiran' => 'array'
    ];

    public function getFormattedTanggalPengajuanAttribute()
    {
        return $this->tanggal_pengajuan ? $this->tanggal_pengajuan->format('d/n/Y') : null;
    }

    public function kemasan()
    {
        return $this->hasMany(Kemasan::class);
    }

    public function petiKemas()
    {
        return $this->hasMany(PetiKemas::class);
    }
}
