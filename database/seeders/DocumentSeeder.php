<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;
use Carbon\Carbon;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'nomor_pengajuan' => 'DOC-20250823-314041',
                'deskripsi' => 'LUAR DAERAH PABEAN → DALAM DAERAH PABEAN',
                'jenis_dokumen' => 'PIB/IMPOR',
                'jenis_pemberitahuan' => 'PEMASUKAN',
                'tanggal_pengajuan' => Carbon::today(),
                'status' => 'Draft'
            ],
            [
                'nomor_pengajuan' => 'DOC-20250822-284521',
                'deskripsi' => 'DALAM DAERAH PABEAN → LUAR DAERAH PABEAN',
                'jenis_dokumen' => 'PEB/EKSPOR',
                'jenis_pemberitahuan' => 'PENGELUARAN',
                'tanggal_pengajuan' => Carbon::yesterday(),
                'status' => 'Submitted'
            ],
            [
                'nomor_pengajuan' => 'DOC-20250821-195634',
                'deskripsi' => 'DOKUMEN PELENGKAP PABEAN',
                'jenis_dokumen' => 'PIB/IMPOR',
                'jenis_pemberitahuan' => 'PEMASUKAN',
                'tanggal_pengajuan' => Carbon::yesterday()->subDay(),
                'status' => 'Approved'
            ]
        ];

        foreach ($documents as $document) {
            Document::create($document);
        }
    }
}
