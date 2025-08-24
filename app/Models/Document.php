<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($document) {
            if (empty($document->nomor_aju)) {
                $document->nomor_aju = static::generateNomorAju();
            }
        });
    }

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
        'tempat_penimbunan',
        // Transaction/Harga fields
        'jenis_valuta',
        'ndpbm',
        'jenis_transaksi',
        'harga_barang_incoterm',
        'harga_barang_nilai',
        'nilai_pabean',
        // Biaya Lainnya fields
        'biaya_penambah',
        'biaya_pengurang',
        'freight',
        'asuransi_jenis',
        'asuransi_nilai',
        'voluntary_declaration',
        // Berat fields
        'berat_kotor',
        'berat_bersih',
        // Pernyataan fields
        'pernyataan_tempat',
        'pernyataan_tanggal',
        'pernyataan_nama',
        'pernyataan_jabatan'
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_tiba' => 'date',
        'pernyataan_tanggal' => 'date',
        'dokumen_lampiran' => 'array'
    ];

    public function getFormattedTanggalPengajuanAttribute()
    {
        return $this->tanggal_pengajuan ? $this->tanggal_pengajuan->format('d/n/Y') : null;
    }

    public static function generateNomorAju()
    {
        $prefix = '000020010653';
        $date = date('Ymd'); // YYYYMMDD format
        
        // Get the last sequence number for today
        $lastDocument = static::whereDate('created_at', today())
            ->where('nomor_aju', 'like', $prefix . $date . '%')
            ->orderBy('nomor_aju', 'desc')
            ->first();
        
        if ($lastDocument && $lastDocument->nomor_aju) {
            // Extract the sequence number from the last nomor_aju
            $lastSequence = (int) substr($lastDocument->nomor_aju, -6);
            $newSequence = $lastSequence + 1;
        } else {
            $newSequence = 1;
        }
        
        // Format sequence number to 6 digits with leading zeros
        $sequenceFormatted = str_pad($newSequence, 6, '0', STR_PAD_LEFT);
        
        return $prefix . $date . $sequenceFormatted;
    }

    public function kemasan()
    {
        return $this->hasMany(Kemasan::class);
    }

    public function petiKemas()
    {
        return $this->hasMany(PetiKemas::class);
    }

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
