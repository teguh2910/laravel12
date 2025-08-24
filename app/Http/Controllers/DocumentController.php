<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function create()
    {
        return view('documents.create');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        // Refresh the model to ensure fresh data from database
        $document = $document->fresh();
        
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        try {
            $validated = $request->validate([
                'nomor_aju' => 'nullable|string',
                'pelabuhan_tujuan' => 'nullable|string',
                'kantor_pabean' => 'nullable|string',
                'jenis_pib' => 'nullable|string',
                'jenis_impor' => 'nullable|string',
                'cara_pembayaran' => 'nullable|string',
                'dokumen_lampiran' => 'nullable|string', // JSON string of documents
                // Importir validation
                'importir_npwp' => 'nullable|string',
                'importir_nitku' => 'nullable|string',
                'importir_nama' => 'nullable|string',
                'importir_alamat' => 'nullable|string',
                'importir_api' => 'nullable|string',
                // NPWP Pemusatan validation
                'pemusatan_npwp' => 'nullable|string',
                'pemusatan_nitku' => 'nullable|string',
                'pemusatan_nama' => 'nullable|string',
                'pemusatan_alamat' => 'nullable|string',
                // Pengirim validation
                'pengirim_nama' => 'nullable|string',
                'pengirim_alamat' => 'nullable|string',
                'pengirim_negara' => 'nullable|string',
                // Pemilik Barang validation
                'pemilik_npwp' => 'nullable|string',
                'pemilik_nitku' => 'nullable|string',
                'pemilik_nama' => 'nullable|string',
                'pemilik_alamat' => 'nullable|string',
                // Penjual validation
                'penjual_nama' => 'nullable|string',
                'penjual_alamat' => 'nullable|string',
                'penjual_negara' => 'nullable|string',
                // Pengangkut validation
                'nomor_tutup_pu' => 'nullable|string',
                'nomor_pos' => 'nullable|string',
                'cara_pengangkutan' => 'nullable|string',
                'nama_sarana_angkut' => 'nullable|string',
                'nomor_voy' => 'nullable|string',
                'bendera' => 'nullable|string',
                'tanggal_tiba' => 'nullable|date',
                'pelabuhan_muat' => 'nullable|string',
                'pelabuhan_transit' => 'nullable|string',
                'tempat_penimbunan' => 'nullable|string',
            ]);

            $document->update($validated);

            // Check if it's an AJAX request
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Dokumen berhasil disimpan!',
                    'data' => $document
                ]);
            }

            return redirect()->route('documents.edit', $document)->with('success', 'Dokumen berhasil disimpan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data yang dimasukkan tidak valid.',
                    'errors' => $e->errors()
                ], 422);
            }
            
            throw $e;
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menyimpan data.'
                ], 500);
            }
            
            throw $e;
        }
    }
}
