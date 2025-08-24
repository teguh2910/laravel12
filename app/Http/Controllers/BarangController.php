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
            'seri' => 'required|integer|min:1',
            'pos_tarif_hs' => 'required|string|max:255',
            'uraian_jenis_barang' => 'required|string',
            'nilai_barang' => 'required|numeric|min:0',
            'jumlah_satuan' => 'required|numeric|min:0',
            'jenis_satuan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $barang = Barang::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
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
            'seri' => 'required|integer|min:1',
            'pos_tarif_hs' => 'required|string|max:255',
            'uraian_jenis_barang' => 'required|string',
            'nilai_barang' => 'required|numeric|min:0',
            'jumlah_satuan' => 'required|numeric|min:0',
            'jenis_satuan' => 'required|string|max:255',
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
