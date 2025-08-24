<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PenjualBarang;
use Illuminate\Http\Request;

class PenjualBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualBarangs = PenjualBarang::orderBy('nama')->paginate(10);
        return view('admin.penjual-barang.index', compact('penjualBarangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penjual-barang.create');
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

        PenjualBarang::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'negara' => $request->negara,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.penjual-barang.index')->with('success', 'Penjual Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjualBarang $penjualBarang)
    {
        return view('admin.penjual-barang.show', compact('penjualBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjualBarang $penjualBarang)
    {
        return view('admin.penjual-barang.edit', compact('penjualBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjualBarang $penjualBarang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'negara' => 'required|string|max:10',
        ]);

        $penjualBarang->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'negara' => $request->negara,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.penjual-barang.index')->with('success', 'Penjual Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjualBarang $penjualBarang)
    {
        $penjualBarang->delete();
        return redirect()->route('admin.penjual-barang.index')->with('success', 'Penjual Barang berhasil dihapus.');
    }
}
