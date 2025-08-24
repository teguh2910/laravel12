<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $documentId = $request->get('document_id');
        
        if ($documentId) {
            $barangs = Barang::where('document_id', $documentId)->get();
        } else {
            $barangs = Barang::all();
        }
        
        return response()->json($barangs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'document_id' => 'required|exists:documents,id',
            'pos_tarif_hs' => 'required|string|max:255',
            'uraian_jenis_barang' => 'required|string',
            'nilai_barang' => 'required|numeric|min:0',
            'jumlah_satuan' => 'required|numeric|min:0',
            'jenis_satuan' => 'required|string|max:255',
            'pernyataan_lartas' => 'nullable|in:terkena,tidak_terkena',
            'kode_barang' => 'nullable|string|max:255',
            'spesifikasi_lain' => 'nullable|string',
            'kondisi_barang' => 'nullable|in:barang_baru,barang_bekas',
            'negara_asal' => 'nullable|string|max:10',
            'berat_bersih' => 'nullable|numeric|min:0',
            'jumlah_kemasan' => 'nullable|numeric|min:0',
            'kemasan' => 'nullable|string|max:255',
            'fob' => 'nullable|numeric|min:0',
            'freight' => 'nullable|numeric|min:0',
            'asuransi' => 'nullable|numeric|min:0',
            'harga_per_satuan' => 'nullable|numeric|min:0',
            'nilai_pabean_rupiah' => 'nullable|numeric|min:0',
            'dokumen_fasilitas_lartas' => 'nullable|string|max:255',
            'bm_rate' => 'nullable|numeric|min:0|max:100',
            'bm_type' => 'nullable|string|max:255',
            'bm_amount' => 'nullable|string|max:255',
            'ppn_rate' => 'nullable|numeric|min:0|max:100',
            'ppn_type' => 'nullable|string|max:255',
            'ppn_amount' => 'nullable|string|max:255',
            'pph_rate' => 'nullable|numeric|min:0|max:100',
            'pph_type' => 'nullable|string|max:255',
            'pph_amount' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $barang = Barang::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil ditambahkan',
                'data' => $barang
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error creating barang: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Error creating barang: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return response()->json($barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'pos_tarif_hs' => 'required|string|max:255',
            'uraian_jenis_barang' => 'required|string',
            'nilai_barang' => 'required|numeric|min:0',
            'jumlah_satuan' => 'required|numeric|min:0',
            'jenis_satuan' => 'required|string|max:255',
            'pernyataan_lartas' => 'nullable|in:terkena,tidak_terkena',
            'kode_barang' => 'nullable|string|max:255',
            'spesifikasi_lain' => 'nullable|string',
            'kondisi_barang' => 'nullable|in:barang_baru,barang_bekas',
            'negara_asal' => 'nullable|string|max:10',
            'berat_bersih' => 'nullable|numeric|min:0',
            'jumlah_kemasan' => 'nullable|numeric|min:0',
            'kemasan' => 'nullable|string|max:255',
            'fob' => 'nullable|numeric|min:0',
            'freight' => 'nullable|numeric|min:0',
            'asuransi' => 'nullable|numeric|min:0',
            'harga_per_satuan' => 'nullable|numeric|min:0',
            'nilai_pabean_rupiah' => 'nullable|numeric|min:0',
            'dokumen_fasilitas_lartas' => 'nullable|string|max:255',
            'bm_rate' => 'nullable|numeric|min:0|max:100',
            'bm_type' => 'nullable|string|max:255',
            'bm_amount' => 'nullable|string|max:255',
            'ppn_rate' => 'nullable|numeric|min:0|max:100',
            'ppn_type' => 'nullable|string|max:255',
            'ppn_amount' => 'nullable|string|max:255',
            'pph_rate' => 'nullable|numeric|min:0|max:100',
            'pph_type' => 'nullable|string|max:255',
            'pph_amount' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $barang->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil diperbarui',
            'data' => $barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil dihapus'
        ]);
    }
}
