<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BC 2.0 - CEISA 4.0</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .tab-active {
            border-bottom: 2px solid #16a34a;
            color: #16a34a;
        }
        .tab-inactive {
            color: #6b7280;
            hover:color: #374151;
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
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900">BC 2.0 - Pemberitahuan Impor Barang</h2>
            <p class="text-sm text-gray-600 mt-1">Lengkapi formulir BC 2.0 untuk proses impor barang</p>
        </div>

        <!-- Tab Navigation Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 pt-4 pb-0">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Form BC 2.0</h3>
            </div>

            <!-- Tab Navigation -->
            <div class="px-6">
                <nav class="flex space-x-8 -mb-px">
                    <button class="tab-link py-4 text-sm font-medium tab-active" data-tab="header">Header</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="entitas">Entitas</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="dokumen">Dokumen</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pengangkut">Pengangkut</button>
                    <button class="tab-link py-4 text-sm font-medium text-red-500 tab-inactive" data-tab="kemasan">Kemasan & Peti Kemas</button>
                    <button class="tab-link py-4 text-sm font-medium text-cyan-500 tab-inactive" data-tab="transaksi">Transaksi</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="barang">Barang</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pungutan">Pungutan</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pernyataan">Pernyataan</button>
                </nav>
            </div>
        </div>

        <!-- Form Content -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <form id="bc20-form" action="{{ route('documents.update', $document) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Tab Contents -->
                @include('documents.tabs.header')
                @include('documents.tabs.entitas')
                @include('documents.tabs.dokumen')
                @include('documents.tabs.pengangkut')
                @include('documents.tabs.kemasan')
                @include('documents.tabs.transaksi')
                @include('documents.tabs.barang')
                @include('documents.tabs.pungutan')
                @include('documents.tabs.pernyataan')
            </form>
        </div>
    </main>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remove active class from all tabs
                    tabLinks.forEach(tab => {
                        tab.classList.remove('tab-active');
                        tab.classList.add('tab-inactive');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.remove('tab-inactive');
                    this.classList.add('tab-active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Show target tab content
                    const targetContent = document.getElementById(targetTab + '-content');
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                });
            });

            // Document modal functionality
            const dokumenModal = document.getElementById('modal-tambah-dokumen');
            const tambahBtn = document.getElementById('tambah-dokumen');
            const closeDokumenBtn = document.getElementById('close-dokumen-modal');
            const batalDokumenBtn = document.getElementById('batal-dokumen');
            const formTambahDokumen = document.getElementById('form-tambah-dokumen');

            // Open modal
            if (tambahBtn) {
                tambahBtn.addEventListener('click', () => {
                    dokumenModal.classList.remove('hidden');
                    dokumenModal.style.display = 'flex';
                });
            }

            // Close modal functions
            function closeDokumenModal() {
                dokumenModal.classList.add('hidden');
                dokumenModal.style.display = 'none';
                if (formTambahDokumen) {
                    formTambahDokumen.reset();
                }
            }

            if (closeDokumenBtn) {
                closeDokumenBtn.addEventListener('click', closeDokumenModal);
            }

            if (batalDokumenBtn) {
                batalDokumenBtn.addEventListener('click', closeDokumenModal);
            }

            // Close modal when clicking outside
            if (dokumenModal) {
                dokumenModal.addEventListener('click', (e) => {
                    if (e.target === dokumenModal) {
                        closeDokumenModal();
                    }
                });
            }

            // Handle form submission
            if (formTambahDokumen) {
                formTambahDokumen.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const jenisDokumen = formData.get('jenis_dokumen');
                    const nomorDokumen = formData.get('nomor_dokumen');
                    const tanggalDokumen = formData.get('tanggal_dokumen');

                    // Get current table body
                    const tbody = document.querySelector('#dokumen-content tbody');
                    if (tbody) {
                        const currentRows = tbody.querySelectorAll('tr').length;
                        const newSeri = currentRows + 1;

                        // Create new row
                        const newRow = `
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${newSeri}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${jenisDokumen}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${nomorDokumen}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${tanggalDokumen}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex space-x-2">
                                        <button type="button" class="text-blue-600 hover:text-blue-900" title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="text-red-600 hover:text-red-900 delete-doc-btn" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `;

                        // Add new row to table
                        tbody.insertAdjacentHTML('beforeend', newRow);

                        // Update total count
                        const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                        if (totalElement) {
                            const newTotal = tbody.querySelectorAll('tr').length;
                            totalElement.textContent = `Total ${newTotal} items`;
                        }

                        // Add event listener to new delete button
                        const newDeleteBtn = tbody.lastElementChild.querySelector('.delete-doc-btn');
                        if (newDeleteBtn) {
                            newDeleteBtn.addEventListener('click', function() {
                                if (confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                                    this.closest('tr').remove();
                                    updateSerialNumbers();
                                }
                            });
                        }
                    }

                    // Close modal
                    closeDokumenModal();
                });
            }

            // Function to update serial numbers after deletion
            function updateSerialNumbers() {
                const tbody = document.querySelector('#dokumen-content tbody');
                if (tbody) {
                    const rows = tbody.querySelectorAll('tr');
                    rows.forEach((row, index) => {
                        const seriCell = row.querySelector('td:first-child');
                        if (seriCell) {
                            seriCell.textContent = index + 1;
                        }
                    });

                    // Update total count
                    const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                    if (totalElement) {
                        totalElement.textContent = `Total ${rows.length} items`;
                    }
                }
            }

            // Add event listeners to existing delete buttons
            document.querySelectorAll('.delete-doc-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                        this.closest('tr').remove();
                        updateSerialNumbers();
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && dokumenModal && !dokumenModal.classList.contains('hidden')) {
                    closeDokumenModal();
                }
            });
        });
    </script>
</body>
</html>
