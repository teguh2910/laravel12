<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get search query if provided
        $search = $request->get('search');
        
        // Get documents from database, or use sample data if none exist
        $query = Document::latest();
        
        // Apply search filter if search term is provided
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_pengajuan', 'like', '%' . $search . '%')
                  ->orWhere('jenis_dokumen', 'like', '%' . $search . '%')
                  ->orWhere('jenis_pemberitahuan', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }
        
        $documents = $query->get();
        
        // Format documents for view
        $documents = $documents->map(function ($document) {
            return [
                'id' => $document->id,
                'nomor_pengajuan' => $document->nomor_pengajuan,
                'nomor_aju' => $document->nomor_aju,
                'deskripsi' => $document->deskripsi,
                'jenis_dokumen' => $document->jenis_dokumen,
                'jenis_pemberitahuan' => $document->jenis_pemberitahuan,
                'tanggal_pengajuan' => $document->formatted_tanggal_pengajuan,
                'status' => $document->status
            ];
        });

        return view('home', compact('documents', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pemberitahuan' => 'required|string',
            'asal_barang' => 'required|string',
            'tujuan_barang' => 'required|string',
            'jenis_dokumen' => 'required|string',
        ]);

        // Generate document number
        $nomor_pengajuan = 'DOC-' . date('Ymd') . '-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        
        // Create description based on origin and destination
        $deskripsi = $request->asal_barang . ' → ' . $request->tujuan_barang;

        $document = Document::create([
            'nomor_pengajuan' => $nomor_pengajuan,
            'deskripsi' => $deskripsi,
            'jenis_dokumen' => $request->jenis_dokumen,
            'jenis_pemberitahuan' => $request->jenis_pemberitahuan,
            'asal_barang' => $request->asal_barang,
            'tujuan_barang' => $request->tujuan_barang,
            'tanggal_pengajuan' => Carbon::now(),
            'status' => 'Draft'
        ]);

        return redirect()->route('documents.edit', $document);
    }

    public function destroy(Document $document)
    {
        try {
            $document->delete();
            return response()->json([
                'success' => true,
                'message' => 'Dokumen berhasil dihapus!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus dokumen.'
            ], 500);
        }
    }
}
