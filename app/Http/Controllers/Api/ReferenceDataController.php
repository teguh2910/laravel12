<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PengirimBarang;
use App\Models\PenjualBarang;
use Illuminate\Http\Request;

class ReferenceDataController extends Controller
{
    public function getPengirimBarang(Request $request)
    {
        $query = PengirimBarang::active();
        
        // Add search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        // Add country filter
        if ($request->has('negara')) {
            $query->where('negara', $request->get('negara'));
        }

        $data = $query->orderBy('nama')->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function getPenjualBarang(Request $request)
    {
        $query = PenjualBarang::active();
        
        // Add search functionality
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        // Add country filter
        if ($request->has('negara')) {
            $query->where('negara', $request->get('negara'));
        }

        $data = $query->orderBy('nama')->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
