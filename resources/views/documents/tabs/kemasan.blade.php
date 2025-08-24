<div id="kemasan-content" class="tab-content p-6 hidden">
    <!-- Kemasan Tab Content -->
    <div class="space-y-6">        
        <!-- Add Kemasan Button -->
        <div>
            <button type="button" id="tambah-kemasan" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">
                + Tambah
            </button>
        </div>

        <br>
        <h3 class="text-lg font-medium text-gray-900 mb-4">Kemasan</h3>
        <!-- Kemasan Table -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div class="px-6 py-4 flex items-center justify-between border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Kemasan</h3>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seri</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Merek</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody id="kemasan-table-body" class="bg-white divide-y divide-gray-200">
                    <!-- Dynamic content will be inserted here -->
                    <tr id="empty-state" class="hover:bg-gray-50">
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Belum ada data kemasan. Klik tombol "Tambah" untuk menambah kemasan.
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Table Footer -->
            <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                <div id="kemasan-total" class="text-sm text-gray-700">
                    Total 0 items
                </div>
                <div class="flex items-center space-x-2">
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <span class="px-3 py-2 text-sm text-gray-500">1</span>
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    <span class="text-sm text-gray-500 ml-2">10 / page</span>
                </div>
            </div>
        </div>

        <!-- Peti Kemas Section -->
         <!-- Add Peti Kemas Button -->
          <br>
        <div>
            <button type="button" id="tambah-petikemas" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">
                + Tambah
            </button>
        </div>
        <div class="mt-8">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Peti Kemas</h3>
            
            <!-- Peti Kemas Table -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seri</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ukuran</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Muatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="petikemas-table-body" class="bg-white divide-y divide-gray-200">
                        <!-- Dynamic content will be inserted here -->
                        <tr id="petikemas-empty-state" class="hover:bg-gray-50">
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                Belum ada data peti kemas. Klik tombol "Tambah" untuk menambah peti kemas.
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Table Footer -->
                <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                    <div id="petikemas-total" class="text-sm text-gray-700">
                        Total 0 items
                    </div>
                    <div class="flex items-center space-x-2">
                        <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <span class="px-3 py-2 text-sm text-gray-500">1</span>
                        <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <span class="text-sm text-gray-500 ml-2">10 / page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'dokumen\']').click()">
            Sebelumnya
        </button>
        <button type="button" id="save-kemasan-next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50" onclick="saveKemasanAndNext()">
            <span id="btn-kemasan-text">Berikutnya</span>
            <span id="btn-kemasan-loading" class="hidden">
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            </span>
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let kemasanData = [];
    let editingIndex = -1;

    // Modal elements
    const modal = document.getElementById('kemasan-modal');
    const modalTitle = document.getElementById('kemasan-modal-title');
    const form = document.getElementById('kemasan-form');
    const tableBody = document.getElementById('kemasan-table-body');
    const emptyState = document.getElementById('empty-state');

    // Form elements
    const jumlahInput = document.getElementById('kemasan-jumlah');
    const jenisInput = document.getElementById('kemasan-jenis');
    const merekInput = document.getElementById('kemasan-merek');
    const indexInput = document.getElementById('kemasan-index');

    // Button elements
    const tambahBtn = document.getElementById('tambah-kemasan');
    const saveBtn = document.getElementById('save-kemasan');
    const cancelBtn = document.getElementById('cancel-kemasan');
    const closeBtnX = document.getElementById('close-kemasan-modal');

    // Open modal for create
    tambahBtn.addEventListener('click', function() {
        openModal('create');
    });

    // Save kemasan
    saveBtn.addEventListener('click', async function() {
        if (form.checkValidity()) {
            const kemasan = {
                jumlah: jumlahInput.value,
                jenis: jenisInput.value,
                merek: merekInput.value
            };

            try {
                // Show loading state
                saveBtn.disabled = true;
                saveBtn.textContent = 'Menyimpan...';

                let savedKemasan;
                if (editingIndex >= 0) {
                    // Update existing
                    const existingKemasan = kemasanData[editingIndex];
                    savedKemasan = await updateKemasan(existingKemasan.id, kemasan);
                    kemasanData[editingIndex] = savedKemasan;
                } else {
                    // Add new
                    savedKemasan = await createKemasan(kemasan);
                    kemasanData.push(savedKemasan);
                }
                
                updateTable();
                closeModal();
                showSuccessMessage(editingIndex >= 0 ? 'Kemasan berhasil diupdate!' : 'Kemasan berhasil ditambahkan!');
            } catch (error) {
                console.error('Error saving kemasan:', error);
                showErrorMessage('Gagal menyimpan kemasan: ' + error.message);
            } finally {
                // Reset button state
                saveBtn.disabled = false;
                saveBtn.textContent = 'Simpan';
            }
        } else {
            form.reportValidity();
        }
    });

    // Cancel modal
    cancelBtn.addEventListener('click', function() {
        closeModal();
    });

    // Close modal with X button
    if (closeBtnX) {
        closeBtnX.addEventListener('click', function() {
            closeModal();
        });
    }

    // Close modal when clicking overlay
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    function openModal(mode, index = -1) {
        editingIndex = index;
        
        if (mode === 'create') {
            modalTitle.textContent = 'Tambah Kemasan';
            form.reset();
        } else if (mode === 'edit') {
            modalTitle.textContent = 'Edit Kemasan';
            const kemasan = kemasanData[index];
            jumlahInput.value = kemasan.jumlah;
            jenisInput.value = kemasan.jenis;
            merekInput.value = kemasan.merek;
        }

        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function closeModal() {
        modal.classList.add('hidden');
        modal.style.display = 'none';
        form.reset();
        editingIndex = -1;
    }

    function updateTable() {
        // Clear existing rows except empty state
        const existingRows = tableBody.querySelectorAll('tr:not(#empty-state)');
        existingRows.forEach(row => row.remove());

        if (kemasanData.length === 0) {
            emptyState.style.display = '';
            updateFooter(0);
            return;
        }

        emptyState.style.display = 'none';

        kemasanData.forEach((kemasan, index) => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${kemasan.seri || (index + 1)}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${kemasan.jumlah}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${kemasan.jenis}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${kemasan.merek}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button type="button" class="text-blue-600 hover:text-blue-900 mr-3 edit-kemasan-btn" data-index="${index}" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button type="button" class="text-red-600 hover:text-red-900 delete-kemasan-btn" data-index="${index}" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Add event listeners to action buttons
        document.querySelectorAll('.edit-kemasan-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                openModal('edit', index);
            });
        });

        document.querySelectorAll('.delete-kemasan-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                deleteKemasan(index);
            });
        });

        updateFooter(kemasanData.length);
    }

    async function deleteKemasan(index) {
        if (confirm('Apakah Anda yakin ingin menghapus data kemasan ini?')) {
            try {
                const kemasan = kemasanData[index];
                await deleteKemasanFromDatabase(kemasan.id);
                kemasanData.splice(index, 1);
                updateTable();
                showSuccessMessage('Kemasan berhasil dihapus!');
            } catch (error) {
                console.error('Error deleting kemasan:', error);
                showErrorMessage('Gagal menghapus kemasan: ' + error.message);
            }
        }
    }

    // API Functions
    async function createKemasan(kemasanData) {
        const response = await fetch(`/documents/{{ $document->id }}/kemasan`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(kemasanData)
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal menambah kemasan');
        }
        
        return data.data;
    }

    async function updateKemasan(id, kemasanData) {
        const response = await fetch(`/documents/{{ $document->id }}/kemasan/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(kemasanData)
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal mengupdate kemasan');
        }
        
        return data.data;
    }

    async function deleteKemasanFromDatabase(id) {
        const response = await fetch(`/documents/{{ $document->id }}/kemasan/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal menghapus kemasan');
        }
        
        return data;
    }

    // Function to show success message
    function showSuccessMessage(message) {
        // Use the same function from edit.blade.php if available, otherwise create simple alert
        if (window.showSuccessMessage) {
            window.showSuccessMessage(message);
        } else {
            alert(message);
        }
    }

    // Function to show error message
    function showErrorMessage(message) {
        // Use the same function from edit.blade.php if available, otherwise create simple alert
        if (window.showErrorMessage) {
            window.showErrorMessage(message);
        } else {
            alert('Error: ' + message);
        }
    }

    // Initialize kemasan data from database
    function initializeKemasanData() {
        // Load existing kemasan data from the server
        const existingData = @json($document->kemasan()->get()->toArray() ?? []);
        if (existingData && Array.isArray(existingData)) {
            kemasanData = existingData.map(item => ({
                id: item.id,
                jumlah: item.jumlah,
                jenis: item.jenis,
                merek: item.merek
            }));
            updateTable();
        }
    }

    function updateFooter(count) {
        const footerText = document.getElementById('kemasan-total');
        if (footerText) {
            footerText.textContent = `Total ${count} items`;
        }
    }

    // Initialize with data from database
    initializeKemasanData();
});

// ===================
// PETI KEMAS SECTION (FULL CRUD)
// ===================
document.addEventListener('DOMContentLoaded', function() {
    let petiKemasData = [];
    let editingPetiKemasIndex = -1;

    // Modal elements
    const petikemasModal = document.getElementById('petikemas-modal');
    const petikemasModalTitle = document.getElementById('petikemas-modal-title');
    const petikemasForm = document.getElementById('petikemas-form');
    const petikemasTableBody = document.getElementById('petikemas-table-body');
    const petikemasEmptyState = document.getElementById('petikemas-empty-state');

    // Form elements
    const seriInput = document.getElementById('petikemas-seri');
    const nomorInput = document.getElementById('petikemas-nomor');
    const ukuranInput = document.getElementById('petikemas-ukuran');
    const jenisMuatanInput = document.getElementById('petikemas-jenis-muatan');
    const tipeInput = document.getElementById('petikemas-tipe');
    const indexInput = document.getElementById('petikemas-index');

    // Button elements
    const tambahPetikemasBtn = document.getElementById('tambah-petikemas');
    const savePetikemasBtn = document.getElementById('save-petikemas');
    const cancelPetikemasBtn = document.getElementById('cancel-petikemas');
    const closePetikemasBtnX = document.getElementById('close-petikemas-modal');

    // Open modal for create
    if (tambahPetikemasBtn) {
        tambahPetikemasBtn.addEventListener('click', function() {
            openPetikemasModal('create');
        });
    }

    // Save peti kemas
    if (savePetikemasBtn) {
        savePetikemasBtn.addEventListener('click', async function() {
            if (petikemasForm.checkValidity()) {
                const petikemas = {
                    seri: seriInput.value,
                    nomor: nomorInput.value,
                    ukuran: ukuranInput.value,
                    jenis_muatan: jenisMuatanInput.value,
                    tipe: tipeInput.value
                };

                try {
                    // Show loading state
                    savePetikemasBtn.disabled = true;
                    savePetikemasBtn.textContent = 'Menyimpan...';

                    let savedPetikemas;
                    if (editingPetiKemasIndex >= 0) {
                        // Update existing
                        const existingPetikemas = petiKemasData[editingPetiKemasIndex];
                        savedPetikemas = await updatePetikemas(existingPetikemas.id, petikemas);
                        petiKemasData[editingPetiKemasIndex] = savedPetikemas;
                    } else {
                        // Add new
                        savedPetikemas = await createPetikemas(petikemas);
                        petiKemasData.push(savedPetikemas);
                    }
                    
                    updatePetiKemasTable();
                    closePetikemasModal();
                    showSuccessMessage(editingPetiKemasIndex >= 0 ? 'Peti kemas berhasil diupdate!' : 'Peti kemas berhasil ditambahkan!');
                } catch (error) {
                    console.error('Error saving peti kemas:', error);
                    showErrorMessage('Gagal menyimpan peti kemas: ' + error.message);
                } finally {
                    // Reset button state
                    savePetikemasBtn.disabled = false;
                    savePetikemasBtn.textContent = 'Simpan';
                }
            } else {
                petikemasForm.reportValidity();
            }
        });
    }

    // Cancel modal
    if (cancelPetikemasBtn) {
        cancelPetikemasBtn.addEventListener('click', function() {
            closePetikemasModal();
        });
    }

    // Close modal with X button
    if (closePetikemasBtnX) {
        closePetikemasBtnX.addEventListener('click', function() {
            closePetikemasModal();
        });
    }

    // Close modal when clicking overlay
    if (petikemasModal) {
        petikemasModal.addEventListener('click', function(e) {
            if (e.target === petikemasModal) {
                closePetikemasModal();
            }
        });
    }

    function openPetikemasModal(mode, index = -1) {
        editingPetiKemasIndex = index;
        
        if (mode === 'create') {
            petikemasModalTitle.textContent = 'Tambah Peti Kemas';
            petikemasForm.reset();
        } else if (mode === 'edit') {
            petikemasModalTitle.textContent = 'Edit Peti Kemas';
            const petikemas = petiKemasData[index];
            seriInput.value = petikemas.seri;
            nomorInput.value = petikemas.nomor;
            ukuranInput.value = petikemas.ukuran;
            jenisMuatanInput.value = petikemas.jenis_muatan;
            tipeInput.value = petikemas.tipe;
        }

        petikemasModal.classList.remove('hidden');
        petikemasModal.style.display = 'flex';
    }

    function closePetikemasModal() {
        petikemasModal.classList.add('hidden');
        petikemasModal.style.display = 'none';
        petikemasForm.reset();
        editingPetiKemasIndex = -1;
    }

    function updatePetiKemasTable() {
        if (!petikemasTableBody) return;

        // Clear existing rows except empty state
        const existingRows = petikemasTableBody.querySelectorAll('tr:not(#petikemas-empty-state)');
        existingRows.forEach(row => row.remove());

        if (petiKemasData.length === 0) {
            petikemasEmptyState.style.display = '';
            updatePetiKemasFooter(0);
            return;
        }

        petikemasEmptyState.style.display = 'none';

        petiKemasData.forEach((petikemas, index) => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-gray-50';
            row.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${petikemas.seri || (index + 1)}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${petikemas.nomor}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${petikemas.ukuran}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${petikemas.jenis_muatan}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${petikemas.tipe}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button type="button" class="text-blue-600 hover:text-blue-900 mr-3 edit-petikemas-btn" data-index="${index}" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                    <button type="button" class="text-red-600 hover:text-red-900 delete-petikemas-btn" data-index="${index}" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </td>
            `;
            petikemasTableBody.appendChild(row);
        });

        // Add event listeners to action buttons
        document.querySelectorAll('.edit-petikemas-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                openPetikemasModal('edit', index);
            });
        });

        document.querySelectorAll('.delete-petikemas-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.dataset.index);
                deletePetikemas(index);
            });
        });

        updatePetiKemasFooter(petiKemasData.length);
    }

    async function deletePetikemas(index) {
        if (confirm('Apakah Anda yakin ingin menghapus data peti kemas ini?')) {
            try {
                const petikemas = petiKemasData[index];
                await deletePetikemasFromDatabase(petikemas.id);
                petiKemasData.splice(index, 1);
                updatePetiKemasTable();
                showSuccessMessage('Peti kemas berhasil dihapus!');
            } catch (error) {
                console.error('Error deleting peti kemas:', error);
                showErrorMessage('Gagal menghapus peti kemas: ' + error.message);
            }
        }
    }

    // API Functions
    async function createPetikemas(petikemasData) {
        const response = await fetch(`/documents/{{ $document->id }}/peti-kemas`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(petikemasData)
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal menambah peti kemas');
        }
        
        return data.data;
    }

    async function updatePetikemas(id, petikemasData) {
        const response = await fetch(`/documents/{{ $document->id }}/peti-kemas/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(petikemasData)
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal mengupdate peti kemas');
        }
        
        return data.data;
    }

    async function deletePetikemasFromDatabase(id) {
        const response = await fetch(`/documents/{{ $document->id }}/peti-kemas/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();
        if (!data.success) {
            throw new Error(data.message || 'Gagal menghapus peti kemas');
        }
        
        return data;
    }

    // Initialize peti kemas data from database
    function initializePetiKemasData() {
        // Load existing peti kemas data from the server
        const existingData = @json($document->petiKemas()->get()->toArray() ?? []);
        if (existingData && Array.isArray(existingData)) {
            petiKemasData = existingData.map(item => ({
                id: item.id,
                seri: item.seri,
                nomor: item.nomor,
                ukuran: item.ukuran,
                jenis_muatan: item.jenis_muatan,
                tipe: item.tipe
            }));
            updatePetiKemasTable();
        }
    }

    function updatePetiKemasFooter(count) {
        const footerText = document.getElementById('petikemas-total');
        if (footerText) {
            footerText.textContent = `Total ${count} items`;
        }
    }

    // Initialize with data from database
    initializePetiKemasData();
});

function saveKemasanAndNext() {
    // You can add validation or save logic here
    console.log('Saving kemasan data and moving to next tab');
    
    // Show loading state
    const btn = document.getElementById('save-kemasan-next-btn');
    const btnText = document.getElementById('btn-kemasan-text');
    const btnLoading = document.getElementById('btn-kemasan-loading');
    
    btnText.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    btn.disabled = true;
    
    // Simulate save operation
    setTimeout(() => {
        btnText.classList.remove('hidden');
        btnLoading.classList.add('hidden');
        btn.disabled = false;
        
        // Move to transaksi tab
        document.querySelector('[data-tab="transaksi"]').click();
    }, 1000);
}
</script>
