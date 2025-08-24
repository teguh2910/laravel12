<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CEISA 4.0 - Detail Dokumen</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <h1 class="text-xl font-semibold text-gray-900">CEISA 4.0 - Detail Dokumen</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">Hi, Customer Importir</span>
                    <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-medium">CI</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Detail Dokumen</h2>
                <p class="text-gray-600">{{ $document->nomor_pengajuan }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('documents.edit', $document) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Dokumen
                </a>
                <button onclick="confirmDelete()" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Hapus
                </button>
            </div>
        </div>

        <!-- Document Details -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Dokumen</h3>
            </div>
            
            <div class="p-6">
                <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nomor Pengajuan</dt>
                        <dd class="mt-1 text-sm text-gray-900 font-medium">{{ $document->nomor_pengajuan }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ $document->status }}
                            </span>
                        </dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Jenis Dokumen</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->jenis_dokumen }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Jenis Pemberitahuan</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->jenis_pemberitahuan }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Asal Barang</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->asal_barang }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tujuan Barang</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->tujuan_barang }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Tanggal Pengajuan</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->formatted_tanggal_pengajuan }}</dd>
                    </div>
                    
                    @if($document->nomor_aju)
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nomor AJU</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $document->nomor_aju }}</dd>
                    </div>
                    @endif
                </dl>
                
                <div class="mt-6">
                    <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $document->deskripsi }}</dd>
                </div>
            </div>
        </div>

        @if($document->importir_nama || $document->pengirim_nama || $document->pemilik_nama || $document->penjual_nama)
        <!-- Additional Information -->
        <div class="mt-6 bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Tambahan</h3>
            </div>
            
            <div class="p-6 space-y-6">
                @if($document->importir_nama)
                <div>
                    <h4 class="text-base font-medium text-gray-900 mb-3">Importir</h4>
                    <dl class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->importir_nama }}</dd>
                        </div>
                        @if($document->importir_npwp)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">NPWP</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->importir_npwp }}</dd>
                        </div>
                        @endif
                        @if($document->importir_alamat)
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->importir_alamat }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
                @endif

                @if($document->pengirim_nama)
                <div>
                    <h4 class="text-base font-medium text-gray-900 mb-3">Pengirim</h4>
                    <dl class="grid grid-cols-1 gap-x-6 gap-y-2 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->pengirim_nama }}</dd>
                        </div>
                        @if($document->pengirim_negara)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Negara</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->pengirim_negara }}</dd>
                        </div>
                        @endif
                        @if($document->pengirim_alamat)
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $document->pengirim_alamat }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
                @endif
            </div>
        </div>
        @endif
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Hapus Dokumen</h3>
                <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin menghapus dokumen ini? Tindakan ini tidak dapat dibatalkan.</p>
                
                <div class="flex justify-center space-x-3">
                    <button onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Batal
                    </button>
                    <button onclick="deleteDocument()" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 text-sm text-gray-500">
                <div>2025 © Host to Host</div>
                <div>Tim Hora</div>
            </div>
        </div>
    </footer>

    <script>
        function confirmDelete() {
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
        }

        async function deleteDocument() {
            try {
                const response = await fetch('{{ route("documents.destroy", $document) }}', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();
                
                if (data.success) {
                    // Redirect to home with success message
                    window.location.href = '{{ route("home") }}?deleted=1';
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menghapus dokumen.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus dokumen.');
            }
            
            closeDeleteModal();
        }

        // Close modal when clicking outside
        document.getElementById('delete-modal').addEventListener('click', (e) => {
            if (e.target.id === 'delete-modal') {
                closeDeleteModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>
