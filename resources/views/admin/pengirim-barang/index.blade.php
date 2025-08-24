@extends('admin.layout')

@section('title', 'Pengirim Barang')
@section('header', 'Pengirim Barang')

@section('content')
<div class="px-4 sm:px-0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-gray-900">Daftar Pengirim Barang</h2>
            <p class="mt-2 text-sm text-gray-700">Kelola data master pengirim barang</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.pengirim-barang.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Tambah Data
            </a>
        </div>
    </div>
    <br>
    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
            @forelse($pengirimBarangs as $pengirim)
            <li>
                <div class="px-4 py-4 flex items-center justify-between hover:bg-gray-50">
                    <div class="flex-1">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-900">{{ $pengirim->nama }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $pengirim->alamat }}</p>
                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $pengirim->negara === 'jp' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $pengirim->negara === 'jp' ? 'Japan' : ($pengirim->negara === 'sg' ? 'Singapore' : strtoupper($pengirim->negara)) }}
                                    </span>
                                    <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $pengirim->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $pengirim->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.pengirim-barang.edit', $pengirim) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">Edit</a>
                        <form action="{{ route('admin.pengirim-barang.destroy', $pengirim) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Hapus</button>
                        </form>
                    </div>
                </div>
            </li>
            @empty
            <li class="px-4 py-8 text-center text-gray-500">
                Tidak ada data pengirim barang
            </li>
            @endforelse
        </ul>
    </div>

    <!-- Pagination -->
    @if($pengirimBarangs->hasPages())
    <div class="mt-6">
        {{ $pengirimBarangs->links() }}
    </div>
    @endif
</div>
@endsection
