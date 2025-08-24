<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>    
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

    <!-- Include Modals -->
    @include('documents.modals.document-modal')

    <script>
        console.log('Document edit script loaded - Version 1.1');
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
                    
                    // Update pelabuhan tujuan when switching to pengangkut tab
                    if (targetTab === 'pengangkut') {
                        updatePelabuhanTujuanInPengangkut();
                    }
                });
            });

            // Listen for changes to pelabuhan tujuan in header to update pengangkut tab
            const headerPelabuhanTujuan = document.querySelector('select[name="pelabuhan_tujuan"]');
            if (headerPelabuhanTujuan) {
                headerPelabuhanTujuan.addEventListener('change', function() {
                    updatePelabuhanTujuanInPengangkut();
                });
            }

            // Document modal functionality
            const dokumenModal = document.getElementById('modal-tambah-dokumen');
            const tambahBtn = document.getElementById('tambah-dokumen');
            const closeDokumenBtn = document.getElementById('close-dokumen-modal');
            const batalDokumenBtn = document.getElementById('batal-dokumen');
            const formTambahDokumen = document.getElementById('form-tambah-dokumen');

            // Open modal
            if (tambahBtn) {
                tambahBtn.addEventListener('click', () => {
                    openDokumenModal('add');
                });
            }

            // Close modal functions
            function closeDokumenModal() {
                dokumenModal.classList.add('hidden');
                dokumenModal.style.display = 'none';
                const formElement = document.getElementById('form-tambah-dokumen');
                if (formElement) {
                    formElement.reset();
                    formElement.removeAttribute('data-edit-index');
                }
            }

            // Open modal for add or edit
            function openDokumenModal(mode, data = null, index = null) {
                const modalTitle = document.getElementById('modal-dokumen-title');
                const submitBtn = document.getElementById('submit-dokumen-btn');
                const formElement = document.getElementById('form-tambah-dokumen');
                
                if (!formElement) {
                    console.error('Form element not found.');
                    return;
                }
                
                if (mode === 'edit') {
                    modalTitle.textContent = 'Edit Dokumen';
                    submitBtn.textContent = 'Update';
                    
                    // Populate form with existing data
                    if (data) {
                        formElement.querySelector('[name="jenis_dokumen"]').value = data.jenis;
                        formElement.querySelector('[name="nomor_dokumen"]').value = data.nomor;
                        formElement.querySelector('[name="tanggal_dokumen"]').value = data.tanggal;
                        formElement.setAttribute('data-edit-index', index);
                    }
                } else {
                    modalTitle.textContent = 'Tambah Dokumen';
                    submitBtn.textContent = 'Simpan';
                    formElement.removeAttribute('data-edit-index');
                }
                
                dokumenModal.classList.remove('hidden');
                dokumenModal.style.display = 'flex';
            }

            // Function to edit a document
            function editDocument(button) {
                const row = button.closest('tr');
                const cells = row.querySelectorAll('td');
                
                if (cells.length >= 4) {
                    const data = {
                        jenis: cells[1].textContent.trim(),
                        nomor: cells[2].textContent.trim(),
                        tanggal: cells[3].textContent.trim()
                    };
                    
                    // Find the index of this row
                    const tbody = document.querySelector('#dokumen-content tbody');
                    const rows = Array.from(tbody.querySelectorAll('tr'));
                    const index = rows.indexOf(row);
                    
                    openDokumenModal('edit', data, index);
                }
            }

            // Add event listeners to existing edit buttons
            function attachEditListeners() {
                document.querySelectorAll('.edit-doc-btn').forEach(btn => {
                    btn.removeEventListener('click', handleEditClick);
                    btn.addEventListener('click', handleEditClick);
                });
            }
            
            function handleEditClick() {
                editDocument(this);
            }

            // Initialize document table on page load
            function initializeDocumentTable() {
                // Temporarily disable automatic sample data clearing
                console.log('Document table initialization - auto-clear disabled');
                
                // Just attach event listeners for existing edit buttons
                attachEditListeners();
            }

            // Function to clear sample data from database
            async function clearSampleData() {
                try {
                    const mainForm = document.getElementById('bc20-form');
                    const mainFormData = new FormData(mainForm);
                    
                    const clearData = new FormData();
                    clearData.append('_token', mainFormData.get('_token'));
                    clearData.append('_method', 'PUT');
                    clearData.append('dokumen_lampiran', JSON.stringify([])); // Empty array

                    const response = await fetch(mainForm.action, {
                        method: 'POST',
                        body: clearData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.ok) {
                        // Refresh the table to show empty state
                        const tbody = document.querySelector('#dokumen-content tbody');
                        if (tbody) {
                            tbody.innerHTML = `
                                <tr class="hover:bg-gray-50">
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Belum ada dokumen. Klik tombol "Tambah" untuk menambah dokumen.
                                    </td>
                                </tr>
                            `;
                        }
                        
                        // Update total count
                        const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                        if (totalElement) {
                            totalElement.textContent = 'Total 0 items';
                        }
                        
                        console.log('Sample data cleared successfully');
                    }
                } catch (error) {
                    console.error('Error clearing sample data:', error);
                }
            }

            // Initialize on page load
            initializeDocumentTable();

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

            // Handle form submission using event delegation
            document.addEventListener('submit', async function(e) {
                if (e.target && e.target.id === 'form-tambah-dokumen') {
                    e.preventDefault();
                    console.log('Form submitted'); // Debug log
                    
                    const formData = new FormData(e.target);
                    const jenisDokumen = formData.get('jenis_dokumen');
                    const nomorDokumen = formData.get('nomor_dokumen');
                    const tanggalDokumen = formData.get('tanggal_dokumen');
                    const editIndex = e.target.getAttribute('data-edit-index');
                    
                    console.log('Form data:', { jenisDokumen, nomorDokumen, tanggalDokumen, editIndex }); // Debug log

                    // Validate required fields
                    if (!jenisDokumen || !nomorDokumen || !tanggalDokumen) {
                        alert('Semua field harus diisi!');
                        return;
                    }

                    try {
                        // Get current documents from database
                        const mainForm = document.getElementById('bc20-form');
                        const mainFormData = new FormData(mainForm);
                        
                        // Collect existing documents from table
                        const documentTable = document.querySelector('#dokumen-content tbody');
                        const documentRows = documentTable ? documentTable.querySelectorAll('tr') : [];
                        const existingDocuments = [];
                        
                        documentRows.forEach((row, index) => {
                            const cells = row.querySelectorAll('td');
                            if (cells.length >= 4 && !cells[0].getAttribute('colspan')) {
                                // Skip empty state row and sample data
                                const jenis = cells[1].textContent.trim();
                                const nomor = cells[2].textContent.trim();
                                const tanggal = cells[3].textContent.trim();
                                
                                if (!(jenis === 'KONTRAK' && nomor === 'df' && tanggal === '2025-08-28')) {
                                    existingDocuments.push({
                                        jenis: jenis,
                                        nomor: nomor,
                                        tanggal: tanggal
                                    });
                                }
                            }
                        });
                        
                        // Handle add or edit mode
                        if (editIndex !== null && editIndex !== undefined) {
                            // Edit mode - update existing document
                            const indexNum = parseInt(editIndex);
                            if (indexNum >= 0 && indexNum < existingDocuments.length) {
                                existingDocuments[indexNum] = {
                                    jenis: jenisDokumen,
                                    nomor: nomorDokumen,
                                    tanggal: tanggalDokumen
                                };
                            }
                        } else {
                            // Add mode - add new document to the array
                            existingDocuments.push({
                                jenis: jenisDokumen,
                                nomor: nomorDokumen,
                                tanggal: tanggalDokumen
                            });
                        }
                        
                        console.log('Documents to save:', existingDocuments); // Debug log
                        
                        // Prepare data for AJAX request
                        const saveData = new FormData();
                        saveData.append('_token', mainFormData.get('_token'));
                        saveData.append('_method', 'PUT');
                        saveData.append('dokumen_lampiran', JSON.stringify(existingDocuments));

                        // Send AJAX request to save immediately
                        const response = await fetch(mainForm.action, {
                            method: 'POST',
                            body: saveData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });

                        const data = await response.json();
                        console.log('Server response:', data); // Debug log

                        if (data.success) {
                            // Update the table to reflect the database state
                            const tbody = document.querySelector('#dokumen-content tbody');
                            if (tbody) {
                                // Clear existing rows
                                tbody.innerHTML = '';
                                
                                // Add all documents from the saved data
                                existingDocuments.forEach((doc, index) => {
                                    const newRow = document.createElement('tr');
                                    newRow.className = 'hover:bg-gray-50';
                                    newRow.innerHTML = `
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${index + 1}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${doc.jenis}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${doc.nomor}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${doc.tanggal}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex space-x-2">
                                                <button type="button" class="text-blue-600 hover:text-blue-900 edit-doc-btn" title="Edit">
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
                                    `;
                                    tbody.appendChild(newRow);
                                });

                                // Update total count
                                const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                                if (totalElement) {
                                    totalElement.textContent = `Total ${existingDocuments.length} items`;
                                }

                                // Re-attach event listeners
                                attachDeleteListeners();
                                attachEditListeners();
                            }

                            // Show success message
                            const isEditMode = editIndex !== null && editIndex !== undefined;
                            const successMsg = isEditMode ? 'Dokumen berhasil diupdate!' : 'Dokumen berhasil ditambahkan!';
                            showSuccessMessage(successMsg);
                            
                            // Refresh dokumen fasilitas dropdown in barang modal
                            if (window.populateDokumenFasilitasOptions) {
                                window.populateDokumenFasilitasOptions();
                            }
                            
                            // Close modal and reset form
                            closeDokumenModal();
                        } else {
                            throw new Error(data.message || 'Gagal menyimpan dokumen');
                        }
                    } catch (error) {
                        console.error('Error saving document:', error);
                        showErrorMessage('Gagal menyimpan dokumen: ' + error.message);
                    }
                }
            });

            // Function to update serial numbers and save to database after changes
            async function updateSerialNumbers() {
                const tbody = document.querySelector('#dokumen-content tbody');
                if (tbody) {
                    const rows = tbody.querySelectorAll('tr');
                    
                    // Check if we have the empty state row
                    if (rows.length === 1) {
                        const firstRow = rows[0];
                        const cells = firstRow.querySelectorAll('td');
                        if (cells.length === 1 && cells[0].getAttribute('colspan') === '5') {
                            // This is the empty state row, update count to 0
                            const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                            if (totalElement) {
                                totalElement.textContent = 'Total 0 items';
                            }
                            return;
                        }
                    }
                    
                    // Update serial numbers for actual data rows
                    rows.forEach((row, index) => {
                        const seriCell = row.querySelector('td:first-child');
                        if (seriCell && !seriCell.getAttribute('colspan')) {
                            seriCell.textContent = index + 1;
                        }
                    });

                    // Update total count
                    const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                    if (totalElement) {
                        totalElement.textContent = `Total ${rows.length} items`;
                    }
                    
                    // Save updated list to database
                    await saveDokumenListToDatabase();
                }
            }

            // Function to save current document list to database
            async function saveDokumenListToDatabase() {
                try {
                    const tbody = document.querySelector('#dokumen-content tbody');
                    const documentRows = tbody ? tbody.querySelectorAll('tr') : [];
                    const documentsData = [];
                    
                    documentRows.forEach((row, index) => {
                        const cells = row.querySelectorAll('td');
                        if (cells.length >= 4 && !cells[0].getAttribute('colspan')) {
                            // Skip empty state row
                            documentsData.push({
                                jenis: cells[1].textContent.trim(),
                                nomor: cells[2].textContent.trim(),
                                tanggal: cells[3].textContent.trim()
                            });
                        }
                    });
                    
                    const mainForm = document.getElementById('bc20-form');
                    const mainFormData = new FormData(mainForm);
                    
                    const saveData = new FormData();
                    saveData.append('_token', mainFormData.get('_token'));
                    saveData.append('_method', 'PUT');
                    saveData.append('dokumen_lampiran', JSON.stringify(documentsData));

                    const response = await fetch(mainForm.action, {
                        method: 'POST',
                        body: saveData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const data = await response.json();
                    if (!data.success) {
                        throw new Error(data.message || 'Gagal menyimpan perubahan');
                    }
                    
                    console.log('Document list updated in database');
                } catch (error) {
                    console.error('Error saving document list:', error);
                    showErrorMessage('Gagal menyimpan perubahan: ' + error.message);
                }
            }

            // Function to delete a document
            async function deleteDocument(button) {
                if (!confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                    return;
                }
                
                try {
                    const row = button.closest('tr');
                    row.remove();
                    
                    // Check if table is now empty
                    const tbody = document.querySelector('#dokumen-content tbody');
                    const remainingRows = tbody.querySelectorAll('tr');
                    
                    if (remainingRows.length === 0) {
                        // Add empty state row
                        tbody.innerHTML = `
                            <tr class="hover:bg-gray-50">
                                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Belum ada dokumen. Klik tombol "Tambah" untuk menambah dokumen.
                                </td>
                            </tr>
                        `;
                    }
                    
                    await updateSerialNumbers();
                    showSuccessMessage('Dokumen berhasil dihapus!');
                    
                    // Refresh dokumen fasilitas dropdown in barang modal
                    if (window.populateDokumenFasilitasOptions) {
                        window.populateDokumenFasilitasOptions();
                    }
                } catch (error) {
                    console.error('Error deleting document:', error);
                    showErrorMessage('Gagal menghapus dokumen: ' + error.message);
                }
            }

            // Add event listeners to existing delete buttons
            function attachDeleteListeners() {
                document.querySelectorAll('.delete-doc-btn').forEach(btn => {
                    btn.removeEventListener('click', handleDeleteClick); // Remove existing listener
                    btn.addEventListener('click', handleDeleteClick);
                });
            }
            
            function handleDeleteClick() {
                deleteDocument(this);
            }
            
            // Initialize delete and edit listeners
            attachDeleteListeners();
            attachEditListeners();

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && dokumenModal && !dokumenModal.classList.contains('hidden')) {
                    closeDokumenModal();
                }
            });
        });

        // Function to save header data and move to next tab
        async function saveHeaderAndNext() {
            const btn = document.getElementById('save-header-next-btn');
            const btnText = document.getElementById('btn-text');
            const btnLoading = document.getElementById('btn-loading');
            
            // Disable button and show loading
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');

            try {
                // Get the form data from header tab
                const form = document.getElementById('bc20-form');
                const formData = new FormData(form);
                
                // Only send header-related fields
                const headerData = new FormData();
                headerData.append('_token', formData.get('_token'));
                headerData.append('_method', 'PUT');
                headerData.append('nomor_aju', formData.get('nomor_aju') || '');
                headerData.append('pelabuhan_tujuan', formData.get('pelabuhan_tujuan') || '');
                headerData.append('kantor_pabean', formData.get('kantor_pabean') || '');
                headerData.append('jenis_pib', formData.get('jenis_pib') || '');
                headerData.append('jenis_impor', formData.get('jenis_impor') || '');
                headerData.append('cara_pembayaran', formData.get('cara_pembayaran') || '');

                // Send AJAX request to update document
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: headerData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Update pelabuhan tujuan in pengangkut tab
                    updatePelabuhanTujuanInPengangkut();
                    
                    // Show success message
                    showSuccessMessage('Data header berhasil disimpan!');
                    
                    // Move to next tab after a short delay
                    setTimeout(() => {
                        document.querySelector('[data-tab="entitas"]').click();
                    }, 500);
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            } finally {
                // Re-enable button and hide loading
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
            }
        }

        // Function to show success message
        function showSuccessMessage(message) {
            // Remove existing messages
            removeMessages();
            
            // Create success message
            const successDiv = document.createElement('div');
            successDiv.className = 'mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded';
            successDiv.innerHTML = message;
            
            // Insert message before the page title
            const pageTitle = document.querySelector('main .mb-6');
            pageTitle.parentNode.insertBefore(successDiv, pageTitle);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                successDiv.remove();
            }, 5000);
        }

        // Function to show error message
        function showErrorMessage(message) {
            // Remove existing messages
            removeMessages();
            
            // Create error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded';
            errorDiv.innerHTML = message;
            
            // Insert message before the page title
            const pageTitle = document.querySelector('main .mb-6');
            pageTitle.parentNode.insertBefore(errorDiv, pageTitle);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                errorDiv.remove();
            }, 5000);
        }

        // Function to remove existing messages
        function removeMessages() {
            const existingMessages = document.querySelectorAll('.bg-green-50, .bg-red-50');
            existingMessages.forEach(msg => msg.remove());
        }

        // Function to update pelabuhan tujuan in pengangkut tab
        function updatePelabuhanTujuanInPengangkut() {
            const headerPelabuhanTujuan = document.querySelector('select[name="pelabuhan_tujuan"]');
            const pengangkutPelabuhanTujuanHidden = document.querySelector('#pengangkut-content input[name="pelabuhan_tujuan"]');
            const pengangkutPelabuhanTujuanDisplay = document.querySelector('#pengangkut-content input[readonly]');
            
            if (headerPelabuhanTujuan && pengangkutPelabuhanTujuanHidden && pengangkutPelabuhanTujuanDisplay) {
                const selectedValue = headerPelabuhanTujuan.value;
                let displayText = 'Belum dipilih di header';
                
                // Map the selected value to display text
                switch(selectedValue) {
                    case 'IDTPP':
                        displayText = 'IDTPP - TANJUNG PRIOK';
                        break;
                    case 'IDCGK':
                        displayText = 'IDCGK - SOEKARNO HATTA';
                        break;
                    default:
                        if (selectedValue) {
                            displayText = selectedValue;
                        }
                }
                
                // Update both hidden and display inputs
                pengangkutPelabuhanTujuanHidden.value = selectedValue;
                pengangkutPelabuhanTujuanDisplay.value = displayText;
            }
        }

        // Function to save entitas data and move to next tab
        async function saveEntitasAndNext() {
            const btn = document.getElementById('save-entitas-next-btn');
            const btnText = document.getElementById('btn-entitas-text');
            const btnLoading = document.getElementById('btn-entitas-loading');
            
            // Disable button and show loading
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');

            try {
                // Get the form data from entitas tab
                const form = document.getElementById('bc20-form');
                const formData = new FormData(form);
                
                // Only send entitas-related fields
                const entitasData = new FormData();
                entitasData.append('_token', formData.get('_token'));
                entitasData.append('_method', 'PUT');
                
                // Importir fields
                entitasData.append('importir_npwp', formData.get('importir_npwp') || '');
                entitasData.append('importir_nitku', formData.get('importir_nitku') || '');
                entitasData.append('importir_nama', formData.get('importir_nama') || '');
                entitasData.append('importir_alamat', formData.get('importir_alamat') || '');
                entitasData.append('importir_api', formData.get('importir_api') || '');
                
                // NPWP Pemusatan fields
                entitasData.append('pemusatan_npwp', formData.get('pemusatan_npwp') || '');
                entitasData.append('pemusatan_nitku', formData.get('pemusatan_nitku') || '');
                entitasData.append('pemusatan_nama', formData.get('pemusatan_nama') || '');
                entitasData.append('pemusatan_alamat', formData.get('pemusatan_alamat') || '');
                
                // Pemilik Barang fields
                entitasData.append('pemilik_npwp', formData.get('pemilik_npwp') || '');
                entitasData.append('pemilik_nitku', formData.get('pemilik_nitku') || '');
                entitasData.append('pemilik_nama', formData.get('pemilik_nama') || '');
                entitasData.append('pemilik_alamat', formData.get('pemilik_alamat') || '');
                
                // Pengirim fields
                entitasData.append('pengirim_nama', formData.get('pengirim_nama') || '');
                entitasData.append('pengirim_alamat', formData.get('pengirim_alamat') || '');
                entitasData.append('pengirim_negara', formData.get('pengirim_negara') || '');
                
                // Penjual fields
                entitasData.append('penjual_nama', formData.get('penjual_nama') || '');
                entitasData.append('penjual_alamat', formData.get('penjual_alamat') || '');
                entitasData.append('penjual_negara', formData.get('penjual_negara') || '');

                // Send AJAX request to update document
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: entitasData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    showSuccessMessage('Data entitas berhasil disimpan!');
                    
                    // Move to next tab after a short delay
                    setTimeout(() => {
                        document.querySelector('[data-tab="dokumen"]').click();
                    }, 500);
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            } finally {
                // Re-enable button and hide loading
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
            }
        }

        // Function to copy importir data to pemusatan fields
        function copyImportirTopemusatan() {
            // Get importir values
            const importirNpwp = document.querySelector('input[name="importir_npwp"]').value;
            const importirNitku = document.querySelector('input[name="importir_nitku"]').value;
            const importirNama = document.querySelector('input[name="importir_nama"]').value;
            const importirAlamat = document.querySelector('textarea[name="importir_alamat"]').value;
            
            // Set pemusatan values
            document.querySelector('input[name="pemusatan_npwp"]').value = importirNpwp;
            document.querySelector('input[name="pemusatan_nitku"]').value = importirNitku;
            document.querySelector('input[name="pemusatan_nama"]').value = importirNama;
            document.querySelector('textarea[name="pemusatan_alamat"]').value = importirAlamat;
        }

        // Function to copy importir data to pemilik fields
        function copyImportirToPemilik() {
            // Get importir values
            const importirNpwp = document.querySelector('input[name="importir_npwp"]').value;
            const importirNitku = document.querySelector('input[name="importir_nitku"]').value;
            const importirNama = document.querySelector('input[name="importir_nama"]').value;
            const importirAlamat = document.querySelector('textarea[name="importir_alamat"]').value;
            
            // Set pemilik values
            document.querySelector('input[name="pemilik_npwp"]').value = importirNpwp;
            document.querySelector('input[name="pemilik_nitku"]').value = importirNitku;
            document.querySelector('input[name="pemilik_nama"]').value = importirNama;
            document.querySelector('textarea[name="pemilik_alamat"]').value = importirAlamat;
        }

        // Add event listeners when document is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Copy buttons
            const copyToPemusatanBtn = document.getElementById('copy-to-pemusatan');
            const copyToPemilikBtn = document.getElementById('copy-to-pemilik');
            
            if (copyToPemusatanBtn) {
                copyToPemusatanBtn.addEventListener('click', copyImportirTopemusatan);
            }
            
            if (copyToPemilikBtn) {
                copyToPemilikBtn.addEventListener('click', copyImportirToPemilik);
            }
        });

        // Function to save dokumen data and move to next tab
        async function saveDokumenAndNext() {
            const btn = document.getElementById('save-dokumen-next-btn');
            const btnText = document.getElementById('btn-dokumen-text');
            const btnLoading = document.getElementById('btn-dokumen-loading');
            
            // Disable button and show loading
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');

            try {
                // Get the form data
                const form = document.getElementById('bc20-form');
                const formData = new FormData(form);
                
                // Collect document data from the table
                const documentTable = document.querySelector('#dokumen-content tbody');
                const documentRows = documentTable ? documentTable.querySelectorAll('tr') : [];
                const documentsData = [];
                
                documentRows.forEach((row, index) => {
                    const cells = row.querySelectorAll('td');
                    if (cells.length >= 4) {
                        documentsData.push({
                            seri: cells[0].textContent.trim(),
                            jenis: cells[1].textContent.trim(),
                            nomor: cells[2].textContent.trim(),
                            tanggal: cells[3].textContent.trim()
                        });
                    }
                });
                
                // Prepare dokumen data for saving
                const dokumenData = new FormData();
                dokumenData.append('_token', formData.get('_token'));
                dokumenData.append('_method', 'PUT');
                
                // Add documents data as JSON if there are any documents
                if (documentsData.length > 0) {
                    dokumenData.append('dokumen_lampiran', JSON.stringify(documentsData));
                }

                // Send AJAX request to update document
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: dokumenData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    showSuccessMessage(`Data dokumen berhasil disimpan! (${documentsData.length} dokumen)`);
                    
                    // Move to next tab after a short delay
                    setTimeout(() => {
                        document.querySelector('[data-tab="pengangkut"]').click();
                    }, 500);
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            } finally {
                // Re-enable button and hide loading
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
            }
        }

        // Function to save pengangkut data
        async function savePengangkutAndNext() {
            const btn = document.getElementById('savePengangkutBtn');
            const btnText = document.getElementById('savePengangkutBtnText');
            const btnLoading = document.getElementById('savePengangkutBtnLoading');
            
            // Disable button and show loading
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            btnLoading.style.display = 'inline-flex';

            try {
                // Get the form data
                const form = document.getElementById('bc20-form');
                const formData = new FormData(form);
                
                // Collect pengangkut specific data
                const pengangkutData = new FormData();
                pengangkutData.append('_token', formData.get('_token'));
                pengangkutData.append('_method', 'PUT');
                
                // Add pengangkut fields
                const pengangkutFields = [
                    'nomor_tutup_pu',
                    'nomor_pos',
                    'cara_pengangkutan',
                    'nama_sarana_angkut',
                    'nomor_voy',
                    'bendera',
                    'tanggal_tiba',
                    'pelabuhan_muat',
                    'pelabuhan_transit',
                    'tempat_penimbunan'
                ];

                pengangkutFields.forEach(field => {
                    const element = document.querySelector(`[name="${field}"]`);
                    if (element && element.value) {
                        pengangkutData.append(field, element.value);
                    }
                });

                // Send AJAX request to update document
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: pengangkutData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    // Show success message
                    showSuccessMessage('Data pengangkut berhasil disimpan!');
                    
                    // Move to next tab after a short delay
                    setTimeout(() => {
                        document.querySelector('[data-tab="kemasan"]').click();
                    }, 500);
                } else {
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan data');
                }
            } catch (error) {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Terjadi kesalahan saat menyimpan data pengangkut. Silakan coba lagi.');
            } finally {
                // Re-enable button and hide loading
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
                btnLoading.style.display = 'none';
            }
        }

        // Handle final save button (Selesai)
        async function handleFinalSave() {
            const btn = document.getElementById('save-final-button');
            if (!btn) return;

            // Create loading state elements if they don't exist
            let btnText = btn.querySelector('.btn-text');
            let btnLoading = btn.querySelector('.btn-loading');
            
            if (!btnText) {
                btnText = document.createElement('span');
                btnText.className = 'btn-text';
                btnText.textContent = btn.textContent;
                btn.innerHTML = '';
                btn.appendChild(btnText);
            }
            
            if (!btnLoading) {
                btnLoading = document.createElement('span');
                btnLoading.className = 'btn-loading hidden';
                btnLoading.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
                btn.appendChild(btnLoading);
            }

            try {
                // Show loading state
                btn.disabled = true;
                btnText.classList.add('hidden');
                btnLoading.classList.remove('hidden');

                const form = document.getElementById('bc20-form');
                
                // Create clean form data with only the essential fields
                const pernyataanData = new FormData();
                
                // Add CSRF token and method from the form
                const formData = new FormData(form);
                pernyataanData.append('_token', formData.get('_token'));
                pernyataanData.append('_method', 'PUT');

                // Add only pernyataan fields
                const pernyataanFields = [
                    'pernyataan_tempat',
                    'pernyataan_tanggal', 
                    'pernyataan_nama',
                    'pernyataan_jabatan'
                ];

                pernyataanFields.forEach(field => {
                    const element = document.querySelector(`[name="${field}"]`);
                    if (element && element.value) {
                        pernyataanData.append(field, element.value);
                    }
                });

                // Send AJAX request to update document
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: pernyataanData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                console.log('Response status:', response.status);

                const data = await response.json();
                console.log('Response data:', data);

                if (data.success) {
                    // Show success message
                    showSuccessMessage('Dokumen berhasil disimpan secara lengkap!');
                    
                    // Redirect to home page after successful save
                    setTimeout(() => {
                        window.location.href = '/';
                    }, 1500);
                } else {
                    // Show specific validation errors if available
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat().join(', ');
                        throw new Error(`Validation errors: ${errorMessages}`);
                    }
                    throw new Error(data.message || 'Terjadi kesalahan saat menyimpan dokumen');
                }
            } catch (error) {
                console.error('Error:', error);
                showErrorMessage(error.message || 'Terjadi kesalahan saat menyimpan dokumen. Silakan coba lagi.');
            } finally {
                // Re-enable button and hide loading
                btn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoading.classList.add('hidden');
            }
        }

        // Add event listener for final save button
        document.addEventListener('DOMContentLoaded', function() {
            const saveButton = document.getElementById('save-final-button');
            if (saveButton) {
                saveButton.addEventListener('click', handleFinalSave);
            }
        });
    </script>

    @include('documents.modals.kemasan-modal')

    @include('documents.modals.petikemas-modal')

    @include('documents.modals.barang-modal')
</body>
</html>
