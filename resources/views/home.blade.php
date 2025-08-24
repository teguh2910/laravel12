<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEISA 4.0 - Document Management</title>
    
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
                    <h1 class="text-xl font-semibold text-gray-900">CEISA 4.0</h1>
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
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                Daftar Dokumen
                @if($search)
                    <span class="text-base font-normal text-gray-600">- Hasil pencarian untuk "{{ $search }}"</span>
                @endif
            </h2>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Action Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="p-4 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex flex-wrap gap-2">
                        <button id="dokumen-baru-btn" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Dokumen Baru
                        </button>
                        <button class="inline-flex items-center px-4 py-2 bg-white text-gray-700 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export
                        </button>
                        <button class="inline-flex items-center px-4 py-2 bg-white text-gray-700 text-sm font-medium border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                            Import
                        </button>
                    </div>
                    <div class="flex items-center">
                        <form method="GET" action="{{ route('home') }}" class="flex">
                            <div class="relative">
                                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari Nomor Pengajuan" class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 border border-blue-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                        @if($search)
                            <a href="{{ route('home') }}" class="ml-2 p-2 text-gray-400 hover:text-gray-500" title="Clear search">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Aju</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Dokumen</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Pemberitahuan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($documents as $index => $document)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $document['nomor_aju'] }}</div>
                                
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document['jenis_dokumen'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document['jenis_pemberitahuan'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document['tanggal_pengajuan'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ $document['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <a href="{{ route('documents.show', $document['id']) }}" class="text-blue-600 hover:text-blue-900" title="View">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('documents.edit', $document['id']) }}" class="text-green-600 hover:text-green-900" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                    <button onclick="confirmDelete({{ $document['id'] }}, '{{ $document['nomor_pengajuan'] }}')" class="text-red-600 hover:text-red-900" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-sm text-gray-500">
                                <div class="flex flex-col items-center">
                                    @if($search)
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <p class="text-lg font-medium mb-1">Tidak ada hasil pencarian</p>
                                        <p>Tidak ditemukan dokumen dengan kata kunci "{{ $search }}"</p>
                                        <a href="{{ route('home') }}" class="mt-2 text-blue-600 hover:text-blue-800">Lihat semua dokumen</a>
                                    @else
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <p class="text-lg font-medium mb-1">Belum ada dokumen</p>
                                        <p>Mulai dengan membuat dokumen baru</p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
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
                <p class="text-sm text-gray-500 mb-2">Apakah Anda yakin ingin menghapus dokumen:</p>
                <p id="document-name" class="text-sm font-medium text-gray-900 mb-6"></p>
                <p class="text-xs text-red-600 mb-6">Tindakan ini tidak dapat dibatalkan.</p>
                
                <div class="flex justify-center space-x-3">
                    <button onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Batal
                    </button>
                    <button id="confirm-delete-btn" onclick="deleteDocument()" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Dokumen Baru -->
    <div id="modal-dokumen-baru" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Dokumen Baru</h3>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form id="form-dokumen-baru" action="{{ route('documents.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Pemberitahuan</label>
                        <select name="jenis_pemberitahuan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-100" required>
                            <option value="PEMASUKAN" selected>PEMASUKAN</option>
                            <option value="PENGELUARAN">PENGELUARAN</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Asal Barang</label>
                        <select name="asal_barang" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="LUAR DAERAH PABEAN" selected>LUAR DAERAH PABEAN</option>
                            <option value="DALAM DAERAH PABEAN">DALAM DAERAH PABEAN</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tujuan Barang</label>
                        <select name="tujuan_barang" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="DALAM DAERAH PABEAN" selected>DALAM DAERAH PABEAN</option>
                            <option value="LUAR DAERAH PABEAN">LUAR DAERAH PABEAN</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Dokumen</label>
                        <select name="jenis_dokumen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="PIB/IMPOR" selected>PIB/IMPOR</option>
                            <option value="PEB/EKSPOR">PEB/EKSPOR</option>
                            <option value="BC 2.3">BC 2.3</option>
                            <option value="BC 4.0">BC 4.0</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" id="batal-btn" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Buat Dokumen
                        </button>
                    </div>
                </form>
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
        // Modal functionality for Dokumen Baru
        const modal = document.getElementById('modal-dokumen-baru');
        const openBtn = document.getElementById('dokumen-baru-btn');
        const closeBtn = document.getElementById('close-modal');
        const batalBtn = document.getElementById('batal-btn');

        // Open modal
        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal
        function closeModal() {
            modal.classList.add('hidden');
        }

        closeBtn.addEventListener('click', closeModal);
        batalBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Delete modal functionality
        let documentToDelete = null;

        function confirmDelete(documentId, documentName) {
            documentToDelete = documentId;
            document.getElementById('document-name').textContent = documentName;
            document.getElementById('delete-modal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('delete-modal').classList.add('hidden');
            documentToDelete = null;
        }

        async function deleteDocument() {
            if (!documentToDelete) return;
            
            const confirmBtn = document.getElementById('confirm-delete-btn');
            confirmBtn.disabled = true;
            confirmBtn.textContent = 'Menghapus...';
            
            try {
                const response = await fetch(`/documents/${documentToDelete}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const data = await response.json();
                
                if (data.success) {
                    // Show success message and reload page
                    alert(data.message);
                    window.location.reload();
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menghapus dokumen.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus dokumen.');
            } finally {
                confirmBtn.disabled = false;
                confirmBtn.textContent = 'Hapus';
                closeDeleteModal();
            }
        }

        // Close delete modal when clicking outside
        document.getElementById('delete-modal').addEventListener('click', (e) => {
            if (e.target.id === 'delete-modal') {
                closeDeleteModal();
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (!document.getElementById('delete-modal').classList.contains('hidden')) {
                    closeDeleteModal();
                } else if (!modal.classList.contains('hidden')) {
                    closeModal();
                }
            }
        });

        // Show success message if document was deleted from detail page
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('deleted') === '1') {
            // Create and show success message
            const successDiv = document.createElement('div');
            successDiv.className = 'mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative';
            successDiv.innerHTML = '<span class="block sm:inline">Dokumen berhasil dihapus!</span>';
            
            const mainContent = document.querySelector('main');
            const pageHeader = mainContent.querySelector('.mb-6');
            mainContent.insertBefore(successDiv, pageHeader.nextSibling);
            
            // Remove the parameter from URL
            window.history.replaceState({}, '', window.location.pathname);
        }
    </script>
</body>
</html>
