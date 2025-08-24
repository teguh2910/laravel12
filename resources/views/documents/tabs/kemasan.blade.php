<div id="kemasan-content" class="tab-content p-6 hidden">
    <h3 class="text-lg font-medium text-gray-900 mb-4">Kemasan & Peti Kemas</h3>
    
    <!-- Kemasan & Peti Kemas Layout -->
    <div class="grid grid-cols-2 gap-6">
        <!-- Kemasan Section -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-md font-medium text-gray-800">Kemasan</h4>
                <div class="space-x-2">
                    <button type="button" class="px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-50">
                        Urutkan
                    </button>
                    <button type="button" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700" onclick="console.log('Button clicked'); window.openKemasanModal();">
                        + Tambah
                    </button>
                </div>
            </div>
            
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Seri</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Jumlah</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Jenis</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Merek</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium w-8"></th>
                        </tr>
                    </thead>
                    <tbody id="kemasan-tbody">
                        <!-- Dynamic content will be loaded here -->
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="px-3 py-2 bg-gray-50 border-t border-gray-200 flex justify-between items-center text-sm text-gray-600">
                    <span id="kemasan-total">Total 0</span>
                    <div class="flex items-center space-x-2">
                        <button type="button" class="px-2 py-1 border border-gray-300 rounded hover:bg-gray-100" id="kemasan-prev" disabled>
                            &lt;
                        </button>
                        <button type="button" class="px-2 py-1 bg-blue-600 text-white rounded" id="kemasan-current">
                            1
                        </button>
                        <button type="button" class="px-2 py-1 border border-gray-300 rounded hover:bg-gray-100" id="kemasan-next" disabled>
                            &gt;
                        </button>
                        <select class="ml-2 px-2 py-1 border border-gray-300 rounded text-sm" id="kemasan-per-page">
                            <option value="10">10 / page</option>
                            <option value="25">25 / page</option>
                            <option value="50">50 / page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Peti Kemas Section -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-md font-medium text-gray-800">Peti Kemas</h4>
                <div class="space-x-2">
                    <button type="button" class="px-3 py-1 text-sm border border-gray-300 rounded hover:bg-gray-50">
                        Urutkan
                    </button>
                    <button type="button" class="px-3 py-1 text-sm bg-blue-600 text-white rounded hover:bg-blue-700" onclick="window.openPetiKemasModal()">
                        + Tambah
                    </button>
                </div>
            </div>
            
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Seri</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Nomor</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Ukuran</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Jenis Muatan</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium">Tipe</th>
                            <th class="px-3 py-2 text-left text-gray-700 font-medium w-8"></th>
                        </tr>
                    </thead>
                    <tbody id="peti-kemas-tbody">
                        <!-- Dynamic content will be loaded here -->
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="px-3 py-2 bg-gray-50 border-t border-gray-200 flex justify-between items-center text-sm text-gray-600">
                    <span id="peti-kemas-total">Total 0</span>
                    <div class="flex items-center space-x-2">
                        <button type="button" class="px-2 py-1 border border-gray-300 rounded hover:bg-gray-100" id="peti-kemas-prev" disabled>
                            &lt;
                        </button>
                        <button type="button" class="px-2 py-1 bg-blue-600 text-white rounded" id="peti-kemas-current">
                            1
                        </button>
                        <button type="button" class="px-2 py-1 border border-gray-300 rounded hover:bg-gray-100" id="peti-kemas-next" disabled>
                            &gt;
                        </button>
                        <select class="ml-2 px-2 py-1 border border-gray-300 rounded text-sm" id="peti-kemas-per-page">
                            <option value="10">10 / page</option>
                            <option value="25">25 / page</option>
                            <option value="50">50 / page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kemasan Modal -->
    <div id="kemasan-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4" id="kemasan-modal-title">Tambah Kemasan</h3>
                <form id="kemasan-form">
                    <input type="hidden" id="kemasan-id">
                    <div class="mb-4">
                        <label for="kemasan-jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" id="kemasan-jumlah" name="jumlah" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="kemasan-jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                        <input type="text" id="kemasan-jenis" name="jenis" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="kemasan-merek" class="block text-sm font-medium text-gray-700">Merek</label>
                        <input type="text" id="kemasan-merek" name="merek" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="window.closeKemasanModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Peti Kemas Modal -->
    <div id="peti-kemas-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 mb-4" id="peti-kemas-modal-title">Tambah Peti Kemas</h3>
                <form id="peti-kemas-form">
                    <input type="hidden" id="peti-kemas-id">
                    <div class="mb-4">
                        <label for="peti-kemas-nomor" class="block text-sm font-medium text-gray-700">Nomor</label>
                        <input type="text" id="peti-kemas-nomor" name="nomor" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="peti-kemas-ukuran" class="block text-sm font-medium text-gray-700">Ukuran</label>
                        <input type="text" id="peti-kemas-ukuran" name="ukuran" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="peti-kemas-jenis-muatan" class="block text-sm font-medium text-gray-700">Jenis Muatan</label>
                        <input type="text" id="peti-kemas-jenis-muatan" name="jenis_muatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="peti-kemas-tipe" class="block text-sm font-medium text-gray-700">Tipe</label>
                        <input type="text" id="peti-kemas-tipe" name="tipe" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="window.closePetiKemasModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Global functions for modal handling - defined immediately
        window.openKemasanModal = function() {
            console.log('openKemasanModal called');
            const modal = document.getElementById('kemasan-modal');
            
            if (!modal) {
                console.error('kemasan-modal element not found');
                return;
            }
            
            // Show modal first
            modal.classList.remove('hidden');
            
            // Use a more robust approach to find and reset form elements
            const modalTitle = modal.querySelector('#kemasan-modal-title') || modal.querySelector('h3');
            const form = modal.querySelector('#kemasan-form') || modal.querySelector('form');
            const idField = modal.querySelector('#kemasan-id') || modal.querySelector('input[type="hidden"]');
            
            console.log('Modal elements found:', { modalTitle, form, idField });
            
            if (modalTitle) {
                modalTitle.textContent = 'Tambah Kemasan';
            }
            if (form) {
                form.reset();
            }
            if (idField) {
                idField.value = '';
            }
        };

        window.closeKemasanModal = function() {
            const modal = document.getElementById('kemasan-modal');
            if (modal) {
                modal.classList.add('hidden');
            } else {
                console.error('kemasan-modal element not found');
            }
        };

        window.openPetiKemasModal = function() {
            document.getElementById('peti-kemas-modal-title').textContent = 'Tambah Peti Kemas';
            document.getElementById('peti-kemas-form').reset();
            document.getElementById('peti-kemas-id').value = '';
            document.getElementById('peti-kemas-modal').classList.remove('hidden');
        };

        window.closePetiKemasModal = function() {
            document.getElementById('peti-kemas-modal').classList.add('hidden');
        };

        // The rest of the script
        let currentDocumentId = {{ $document->id }};
        let kemasanCurrentPage = 1;
        let petiKemasCurrentPage = 1;
        let kemasanDataLoaded = false;
        let petiKemasDataLoaded = false;

        // Observer to detect when tab becomes visible
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    const element = mutation.target;
                    if (element.id === 'kemasan-content' && !element.classList.contains('hidden')) {
                        if (!kemasanDataLoaded || !petiKemasDataLoaded) {
                            loadKemasanData();
                            loadPetiKemasData();
                            kemasanDataLoaded = true;
                            petiKemasDataLoaded = true;
                        }
                    }
                }
            });
        });

        // Start observing the kemasan content div
        document.addEventListener('DOMContentLoaded', function() {
            const kemasanContent = document.getElementById('kemasan-content');
            if (kemasanContent) {
                observer.observe(kemasanContent, { attributes: true });
                
                // If tab is already visible, load data immediately
                if (!kemasanContent.classList.contains('hidden')) {
                    loadKemasanData();
                    loadPetiKemasData();
                    kemasanDataLoaded = true;
                    petiKemasDataLoaded = true;
                }
            }
        });

        // Kemasan Functions
        function loadKemasanData(page = 1) {
            console.log(`Loading kemasan data for document ${currentDocumentId}, page ${page}`);
            fetch(`/documents/${currentDocumentId}/kemasan?page=${page}`)
                .then(response => {
                    console.log('Kemasan response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Kemasan data received:', data);
                    const tbody = document.getElementById('kemasan-tbody');
                    tbody.innerHTML = '';
                    
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(item => {
                            tbody.innerHTML += `
                                <tr class="border-t border-gray-200">
                                    <td class="px-3 py-2">${item.seri}</td>
                                    <td class="px-3 py-2">${item.jumlah}</td>
                                    <td class="px-3 py-2">${item.jenis}</td>
                                    <td class="px-3 py-2">${item.merek}</td>
                                    <td class="px-3 py-2">
                                        <div class="flex space-x-1">
                                            <button type="button" onclick="editKemasan(${item.id})" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <button type="button" onclick="deleteKemasan(${item.id})" class="text-red-600 hover:text-red-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        tbody.innerHTML = '<tr><td colspan="5" class="px-3 py-4 text-center text-gray-500">Tidak ada data kemasan</td></tr>';
                    }
                    
                    document.getElementById('kemasan-total').textContent = `Total ${data.total || 0}`;
                    updateKemasanPagination(data);
                })
                .catch(error => {
                    console.error('Error loading kemasan data:', error);
                    const tbody = document.getElementById('kemasan-tbody');
                    tbody.innerHTML = '<tr><td colspan="5" class="px-3 py-4 text-center text-red-500">Error loading data</td></tr>';
                });
        }

        function updateKemasanPagination(data) {
            const prevBtn = document.getElementById('kemasan-prev');
            const nextBtn = document.getElementById('kemasan-next');
            const currentBtn = document.getElementById('kemasan-current');
            
            prevBtn.disabled = data.current_page === 1;
            nextBtn.disabled = data.current_page === data.last_page;
            currentBtn.textContent = data.current_page;
            
            kemasanCurrentPage = data.current_page;
        }

        function editKemasan(id) {
            fetch(`/documents/${currentDocumentId}/kemasan/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('kemasan-modal-title').textContent = 'Edit Kemasan';
                    document.getElementById('kemasan-id').value = data.id;
                    document.getElementById('kemasan-jumlah').value = data.jumlah;
                    document.getElementById('kemasan-jenis').value = data.jenis;
                    document.getElementById('kemasan-merek').value = data.merek;
                    document.getElementById('kemasan-modal').classList.remove('hidden');
                })
                .catch(error => console.error('Error:', error));
        }

        function deleteKemasan(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kemasan ini?')) {
                fetch(`/documents/${currentDocumentId}/kemasan/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        loadKemasanData(kemasanCurrentPage);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        document.getElementById('kemasan-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const id = document.getElementById('kemasan-id').value;
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            console.log('Submitting kemasan data:', data);
            
            const url = id ? `/documents/${currentDocumentId}/kemasan/${id}` : `/documents/${currentDocumentId}/kemasan`;
            const method = id ? 'PUT' : 'POST';
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                console.log('Kemasan form response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Kemasan form response:', data);
                if (data.success) {
                    alert(data.message);
                    closeKemasanModal();
                    loadKemasanData(kemasanCurrentPage);
                } else {
                    alert('Error: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error submitting kemasan form:', error);
                alert('Error submitting form: ' + error.message);
            });
        });

        // Peti Kemas Functions
        function loadPetiKemasData(page = 1) {
            console.log(`Loading peti kemas data for document ${currentDocumentId}, page ${page}`);
            fetch(`/documents/${currentDocumentId}/peti-kemas?page=${page}`)
                .then(response => {
                    console.log('Peti kemas response status:', response.status);
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Peti kemas data received:', data);
                    const tbody = document.getElementById('peti-kemas-tbody');
                    tbody.innerHTML = '';
                    
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(item => {
                            tbody.innerHTML += `
                                <tr class="border-t border-gray-200">
                                    <td class="px-3 py-2">${item.seri}</td>
                                    <td class="px-3 py-2">${item.nomor}</td>
                                    <td class="px-3 py-2">${item.ukuran}</td>
                                    <td class="px-3 py-2">${item.jenis_muatan}</td>
                                    <td class="px-3 py-2">${item.tipe}</td>
                                    <td class="px-3 py-2">
                                        <div class="flex space-x-1">
                                            <button type="button" onclick="editPetiKemas(${item.id})" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <button type="button" onclick="deletePetiKemas(${item.id})" class="text-red-600 hover:text-red-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        tbody.innerHTML = '<tr><td colspan="6" class="px-3 py-4 text-center text-gray-500">Tidak ada data peti kemas</td></tr>';
                    }
                    
                    document.getElementById('peti-kemas-total').textContent = `Total ${data.total || 0}`;
                    updatePetiKemasPagination(data);
                })
                .catch(error => {
                    console.error('Error loading peti kemas data:', error);
                    const tbody = document.getElementById('peti-kemas-tbody');
                    tbody.innerHTML = '<tr><td colspan="6" class="px-3 py-4 text-center text-red-500">Error loading data</td></tr>';
                });
        }

        function updatePetiKemasPagination(data) {
            const prevBtn = document.getElementById('peti-kemas-prev');
            const nextBtn = document.getElementById('peti-kemas-next');
            const currentBtn = document.getElementById('peti-kemas-current');
            
            prevBtn.disabled = data.current_page === 1;
            nextBtn.disabled = data.current_page === data.last_page;
            currentBtn.textContent = data.current_page;
            
            petiKemasCurrentPage = data.current_page;
        }

        function editPetiKemas(id) {
            fetch(`/documents/${currentDocumentId}/peti-kemas/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('peti-kemas-modal-title').textContent = 'Edit Peti Kemas';
                    document.getElementById('peti-kemas-id').value = data.id;
                    document.getElementById('peti-kemas-nomor').value = data.nomor;
                    document.getElementById('peti-kemas-ukuran').value = data.ukuran;
                    document.getElementById('peti-kemas-jenis-muatan').value = data.jenis_muatan;
                    document.getElementById('peti-kemas-tipe').value = data.tipe;
                    document.getElementById('peti-kemas-modal').classList.remove('hidden');
                })
                .catch(error => console.error('Error:', error));
        }

        function deletePetiKemas(id) {
            if (confirm('Apakah Anda yakin ingin menghapus peti kemas ini?')) {
                fetch(`/documents/${currentDocumentId}/peti-kemas/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        loadPetiKemasData(petiKemasCurrentPage);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        document.getElementById('peti-kemas-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const id = document.getElementById('peti-kemas-id').value;
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            const url = id ? `/documents/${currentDocumentId}/peti-kemas/${id}` : `/documents/${currentDocumentId}/peti-kemas`;
            const method = id ? 'PUT' : 'POST';
            
            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closePetiKemasModal();
                    loadPetiKemasData(petiKemasCurrentPage);
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Pagination event listeners
        document.getElementById('kemasan-prev').addEventListener('click', () => {
            if (kemasanCurrentPage > 1) {
                loadKemasanData(kemasanCurrentPage - 1);
            }
        });

        document.getElementById('kemasan-next').addEventListener('click', () => {
            loadKemasanData(kemasanCurrentPage + 1);
        });

        document.getElementById('peti-kemas-prev').addEventListener('click', () => {
            if (petiKemasCurrentPage > 1) {
                loadPetiKemasData(petiKemasCurrentPage - 1);
            }
        });

        document.getElementById('peti-kemas-next').addEventListener('click', () => {
            loadPetiKemasData(petiKemasCurrentPage + 1);
        });
    </script>
    
    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'pengangkut\']').click()">
            Sebelumnya
        </button>
        <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="document.querySelector('[data-tab=\'transaksi\']').click()">
            Berikutnya
        </button>
    </div>
</div>
