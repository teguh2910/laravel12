<?php

namespace App\Http\Controllers;

use App\Models\Kemasan;
use App\Models\Document;
use Illuminate\Http\Request;

class KemasanController extends Controller
{
    public function index($documentId)
    {
        $document = Document::findOrFail($documentId);
        $kemasan = $document->kemasan()->paginate(10);
        return response()->json($kemasan);
    }

    public function store(Request $request, $documentId)
    {
        $document = Document::findOrFail($documentId);
        
        $validated = $request->validate([
            'jumlah' => 'required|integer',
            'jenis' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
        ]);

        // Get the next seri number
        $lastSeri = $document->kemasan()->max('seri') ?? 0;
        $validated['seri'] = $lastSeri + 1;
        $validated['document_id'] = $document->id;

        $kemasan = Kemasan::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Kemasan berhasil ditambahkan',
            'data' => $kemasan
        ]);
    }

    public function show($documentId, Kemasan $kemasan)
    {
        return response()->json($kemasan);
    }

    public function update(Request $request, $documentId, Kemasan $kemasan)
    {
        $validated = $request->validate([
            'jumlah' => 'required|integer',
            'jenis' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
        ]);

        $kemasan->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Kemasan berhasil diupdate',
            'data' => $kemasan
        ]);
    }

    public function destroy($documentId, Kemasan $kemasan)
    {
        $kemasan->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Kemasan berhasil dihapus'
        ]);
    }
}
