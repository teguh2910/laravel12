<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengirimBarang;
use Illuminate\Http\Request;

class PengirimBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengirimBarangs = PengirimBarang::orderBy('nama')->paginate(10);
        return view('admin.pengirim-barang.index', compact('pengirimBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengirim-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'negara' => 'required|string|max:10',
        ]);

        PengirimBarang::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'negara' => $request->negara,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.pengirim-barang.index')->with('success', 'Pengirim Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengirimBarang $pengirimBarang)
    {
        return view('admin.pengirim-barang.show', compact('pengirimBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengirimBarang $pengirimBarang)
    {
        return view('admin.pengirim-barang.edit', compact('pengirimBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengirimBarang $pengirimBarang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'negara' => 'required|string|max:10',
        ]);

        $pengirimBarang->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'negara' => $request->negara,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.pengirim-barang.index')->with('success', 'Pengirim Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengirimBarang $pengirimBarang)
    {
        $pengirimBarang->delete();
        return redirect()->route('admin.pengirim-barang.index')->with('success', 'Pengirim Barang berhasil dihapus.');
    }
}
