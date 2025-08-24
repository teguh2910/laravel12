<?php

namespace App\Http\Controllers;

use App\Models\PetiKemas;
use App\Models\Document;
use Illuminate\Http\Request;

class PetiKemasController extends Controller
{
    public function index($documentId)
    {
        $document = Document::findOrFail($documentId);
        $petiKemas = $document->petiKemas()->paginate(10);
        return response()->json($petiKemas);
    }

    public function store(Request $request, $documentId)
    {
        $document = Document::findOrFail($documentId);
        
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'jenis_muatan' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
        ]);

        // Get the next seri number
        $lastSeri = $document->petiKemas()->max('seri') ?? 0;
        $validated['seri'] = $lastSeri + 1;
        $validated['document_id'] = $document->id;

        $petiKemas = PetiKemas::create($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Peti Kemas berhasil ditambahkan',
            'data' => $petiKemas
        ]);
    }

    public function show($documentId, PetiKemas $petiKemas)
    {
        return response()->json($petiKemas);
    }

    public function update(Request $request, $documentId, PetiKemas $petiKemas)
    {
        $validated = $request->validate([
            'nomor' => 'required|string|max:255',
            'ukuran' => 'required|string|max:255',
            'jenis_muatan' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
        ]);

        $petiKemas->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Peti Kemas berhasil diupdate',
            'data' => $petiKemas
        ]);
    }

    public function destroy($documentId, PetiKemas $petiKemas)
    {
        $petiKemas->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Peti Kemas berhasil dihapus'
        ]);
    }
}
