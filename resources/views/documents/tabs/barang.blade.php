<div id="barang-content" class="tab-content p-6 hidden">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-medium text-gray-900">Barang</h3>
        <div class="flex gap-2">
            <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                Generate Pungutan
            </button>
            <button type="button" id="add-barang-btn" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                + Tambah
            </button>
            <button type="button" onclick="console.log('Test button clicked'); console.log('BarangCRUD:', window.BarangCRUD);" class="px-3 py-1 bg-yellow-600 text-white rounded-md hover:bg-yellow-700 text-xs">
                Test
            </button>
        </div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            
            <!-- Table Header -->
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Seri</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Pos Tarif/HS</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Uraian Jenis Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nilai Barang</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jumlah Satuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Jenis Satuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody id="barang-table-body" class="bg-white divide-y divide-gray-200">
                <!-- Data will be populated here via CRUD operations -->
                <tr id="empty-state" class="hidden">
                    <td colspan="7" class="px-6 py-8 text-center text-sm text-gray-500">
                        <div class="flex flex-col items-center">
                            <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m0 0v5a2 2 0 002 2h2a2 2 0 002-2v-5m-6 0v-5m0 0V6a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6"></path>
                            </svg>
                            <p class="text-lg font-medium text-gray-400 mb-2">Belum ada data barang</p>
                            <p class="text-sm text-gray-400">Klik tombol "Tambah" untuk menambahkan barang baru</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'transaksi\']').click()">
            Sebelumnya
        </button>
        <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="document.querySelector('[data-tab=\'pungutan\']').click()">
            Berikutnya
        </button>
    </div>
</div>

<!-- JavaScript for CRUD operations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Barang CRUD script loaded - START');
        
        // Ensure BarangCRUD namespace is created early
        window.BarangCRUD = window.BarangCRUD || {};
        console.log('BarangCRUD namespace created:', window.BarangCRUD);
        
        // Wait a bit for DOM to be fully ready
        setTimeout(function() {
            initializeBarangCRUD();
        }, 100);
    });
    
    function initializeBarangCRUD() {
        console.log('Initializing Barang CRUD...');
        
        const modal = document.getElementById('barang-modal');
        const form = document.getElementById('barang-form');
        const tableBody = document.getElementById('barang-table-body');
        const emptyState = document.getElementById('empty-state');
        const addBtn = document.getElementById('add-barang-btn');
        const closeModal = document.getElementById('close-modal');
        const cancelBtn = document.getElementById('cancel-btn');
        
        console.log('Modal element:', modal);
        console.log('Form element:', form);
        console.log('Add button element:', addBtn);
        console.log('Close modal button:', closeModal);
        console.log('Cancel button:', cancelBtn);
        
        if (!modal) {
            console.error('Modal not found! Make sure barang-modal exists in the DOM');
            return;
        }
        
        if (!form) {
            console.error('Form not found! Make sure barang-form exists in the modal');
            return;
        }
        
        if (!tableBody) {
            console.error('Table body not found!');
            return;
        }
        
        let editingId = null;

        // Load data on page load
        loadBarangData();

        // Event listeners with better error checking
        if (addBtn) {
            addBtn.addEventListener('click', function(e) {
                console.log('Add button clicked');
                e.preventDefault();
                e.stopPropagation();
                openAddModal();
            });
            console.log('Add button event listener attached');
        } else {
            console.error('Add button not found!');
        }
        
        if (closeModal) {
            closeModal.addEventListener('click', closeModalDialog);
        }
        
        if (cancelBtn) {
            cancelBtn.addEventListener('click', closeModalDialog);
        }
        
        if (form) {
            form.addEventListener('submit', handleFormSubmit);
        }

        // Modal outside click to close
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModalDialog();
                }
            });
        }

        function openAddModal() {
            console.log('Opening add modal');
            if (!modal) {
                console.error('Modal element not found!');
                showNotification('Modal tidak ditemukan. Silakan refresh halaman.', 'error');
                return;
            }
            
            const modalTitle = document.getElementById('modal-title');
            const saveBtn = document.getElementById('save-btn');
            
            if (modalTitle) {
                modalTitle.textContent = 'Tambah Barang';
            }
            
            if (saveBtn) {
                saveBtn.textContent = 'Simpan';
            }
            
            if (form) {
                form.reset();
            }
            
            clearErrors();
            editingId = null;
            modal.classList.remove('hidden');
            console.log('Modal should be visible now');
        }

            function openEditModal(barang) {
                if (!modal) {
                    console.error('Modal element not found!');
                    showNotification('Modal tidak ditemukan. Silakan refresh halaman.', 'error');
                    return;
                }
                
                const modalTitle = document.getElementById('modal-title');
                const saveBtn = document.getElementById('save-btn');
                
                if (modalTitle) {
                    modalTitle.textContent = 'Edit Barang';
                }
                
                if (saveBtn) {
                    saveBtn.textContent = 'Update';
                }
                
                // Fill form with barang data
                const barangId = document.getElementById('barang-id');
                const seri = document.getElementById('seri');
                const posTarifHs = document.getElementById('pos_tarif_hs');
                const uraianJenisBarang = document.getElementById('uraian_jenis_barang');
                const nilaiBarang = document.getElementById('nilai_barang');
                const jumlahSatuan = document.getElementById('jumlah_satuan');
                const jenisSatuan = document.getElementById('jenis_satuan');
                
                if (barangId) barangId.value = barang.id;
                if (seri) seri.value = barang.seri;
                if (posTarifHs) posTarifHs.value = barang.pos_tarif_hs;
                if (uraianJenisBarang) uraianJenisBarang.value = barang.uraian_jenis_barang;
                if (nilaiBarang) nilaiBarang.value = barang.nilai_barang;
                if (jumlahSatuan) jumlahSatuan.value = barang.jumlah_satuan;
                if (jenisSatuan) jenisSatuan.value = barang.jenis_satuan;
                
                clearErrors();
                editingId = barang.id;
                modal.classList.remove('hidden');
            }

            function closeModalDialog() {
                if (modal) {
                    modal.classList.add('hidden');
                }
                if (form) {
                    form.reset();
                }
                clearErrors();
                editingId = null;
            }

            function clearErrors() {
                const errorElements = document.querySelectorAll('[id$="-error"]');
                errorElements.forEach(el => {
                    el.classList.add('hidden');
                    el.textContent = '';
                });
            }

            function displayErrors(errors) {
                clearErrors();
                for (const field in errors) {
                    const errorElement = document.getElementById(field + '-error');
                    if (errorElement) {
                        errorElement.textContent = errors[field][0];
                        errorElement.classList.remove('hidden');
                    }
                }
            }

            async function handleFormSubmit(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                
                // Set document_id (you might need to get this from somewhere else)
                data.document_id = {{ $document->id }};
                
                try {
                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]');
                    if (!csrfToken) {
                        throw new Error('CSRF token not found');
                    }
                    
                    let response;
                    if (editingId) {
                        response = await fetch(`/api/barang/${editingId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(data)
                        });
                    } else {
                        response = await fetch('/api/barang', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(data)
                        });
                    }

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const result = await response.json();
                    
                    if (result.success) {
                        closeModalDialog();
                        await loadBarangData();
                        showNotification(result.message, 'success');
                    } else {
                        if (result.errors) {
                            displayErrors(result.errors);
                        } else {
                            showNotification(result.message || 'Terjadi kesalahan', 'error');
                        }
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showNotification('Terjadi kesalahan saat menyimpan data: ' + error.message, 'error');
                }
            }

            async function loadBarangData() {
                try {
                    const documentId = {{ $document->id }};
                    const response = await fetch(`/api/barang?document_id=${documentId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    
                    const barangs = await response.json();
                    
                    console.log('Loaded barangs:', barangs);
                    
                    if (!Array.isArray(barangs) || barangs.length === 0) {
                        showEmptyState();
                    } else {
                        hideEmptyState();
                        renderBarangTable(barangs);
                    }
                } catch (error) {
                    console.error('Error loading data:', error);
                    showNotification('Terjadi kesalahan saat memuat data: ' + error.message, 'error');
                    showEmptyState();
                }
            }

            function showEmptyState() {
                // Clear existing rows except empty state
                const rows = tableBody.querySelectorAll('tr:not(#empty-state)');
                rows.forEach(row => row.remove());
                emptyState.classList.remove('hidden');
            }

            function hideEmptyState() {
                emptyState.classList.add('hidden');
            }

            function renderBarangTable(barangs) {
                // Clear existing rows except empty state
                const rows = tableBody.querySelectorAll('tr:not(#empty-state)');
                rows.forEach(row => row.remove());

                barangs.forEach(barang => {
                    const row = document.createElement('tr');
                    row.className = 'hover:bg-gray-50 group';
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${barang.seri}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${barang.pos_tarif_hs}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">${barang.uraian_jenis_barang}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatNumber(barang.nilai_barang)}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${formatNumber(barang.jumlah_satuan)}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${barang.jenis_satuan}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex gap-2">
                                <button type="button" onclick="BarangCRUD.editBarang(${barang.id}); return false;" class="text-blue-600 hover:text-blue-800" title="Edit Barang">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button type="button" onclick="BarangCRUD.deleteBarang(${barang.id}); return false;" class="text-red-600 hover:text-red-800" title="Hapus Barang">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            }

            // Create namespaced global functions to avoid conflicts with other tabs
            if (!window.BarangCRUD) {
                window.BarangCRUD = {};
            }
            
            window.BarangCRUD.editBarang = async function(id) {
                console.log('=== BarangCRUD.editBarang called with id:', id, '===');
                console.log('Function called from:', new Error().stack);
                try {
                    const response = await fetch(`/api/barang?document_id={{ $document->id }}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    
                    const barangs = await response.json();
                    console.log('Fetched barangs for edit:', barangs);
                    const barang = barangs.find(b => b.id === id);
                    
                    if (barang) {
                        console.log('Found barang to edit:', barang);
                        openEditModal(barang);
                    } else {
                        console.error('Barang not found with id:', id);
                        showNotification('Data barang tidak ditemukan', 'error');
                    }
                } catch (error) {
                    console.error('Error in editBarang:', error);
                    showNotification('Terjadi kesalahan saat mengambil data: ' + error.message, 'error');
                }
            };

            window.BarangCRUD.deleteBarang = async function(id) {
                console.log('=== BarangCRUD.deleteBarang called with id:', id, '===');
                console.log('Function called from:', new Error().stack);
                if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
                    try {
                        const csrfToken = document.querySelector('meta[name="csrf-token"]');
                        if (!csrfToken) {
                            throw new Error('CSRF token not found');
                        }

                        const response = await fetch(`/api/barang/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        });
                        
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        const result = await response.json();
                        console.log('Delete result:', result);
                        if (result.success) {
                            await loadBarangData();
                            showNotification(result.message, 'success');
                        } else {
                            showNotification(result.message || 'Terjadi kesalahan', 'error');
                        }
                    } catch (error) {
                        console.error('Error in deleteBarang:', error);
                        showNotification('Terjadi kesalahan saat menghapus data: ' + error.message, 'error');
                    }
                }
            };
            
            console.log('BarangCRUD functions registered:', window.BarangCRUD);

            function formatNumber(num) {
                return new Intl.NumberFormat('id-ID').format(num);
            }

            function showNotification(message, type = 'info') {
                // Simple notification - you can enhance this
                const notification = document.createElement('div');
                notification.className = `fixed top-4 right-4 px-4 py-2 rounded-md text-white z-50 ${
                    type === 'success' ? 'bg-green-600' : 
                    type === 'error' ? 'bg-red-600' : 'bg-blue-600'
                }`;
                notification.textContent = message;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            }
    } // End of initializeBarangCRUD function
</script>
</div>
