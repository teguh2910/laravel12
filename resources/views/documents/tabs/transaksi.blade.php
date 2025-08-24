<div id="transaksi-content" class="tab-content p-6 hidden">
    <h3 class="text-lg font-medium text-gray-900 mb-6">Transaksi</h3>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Harga Card -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Harga</h4>
                    
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jenis Valuta 
                        
                    </label>
                    <select name="jenis_valuta" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="JPY" {{ old('jenis_valuta', $document->jenis_valuta) == 'JPY' ? 'selected' : '' }}>JPY - YEN</option>
                        <option value="USD" {{ old('jenis_valuta', $document->jenis_valuta) == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                        <option value="IDR" {{ old('jenis_valuta', $document->jenis_valuta) == 'IDR' ? 'selected' : '' }}>IDR - Rupiah</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NDPBM <span class="text-xs text-gray-500">(affects Nilai Pabean)</span>
                    </label>
                    <input type="text" name="ndpbm" id="ndpbm" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('ndpbm', $document->ndpbm ?? '0') }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Transaksi</label>
                    <select name="jenis_transaksi" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="LAI">LAI - TRANSAKSI PERDAGANGAN ATAU CARA PEMBAYARAN LAINNYA</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Harga Barang <span class="text-xs text-gray-500">(affects Nilai Pabean)</span>
                    </label>
                    <div class="flex">
                        <select name="harga_barang_incoterm" class="px-3 py-2 border border-gray-300 rounded-l-md border-r-0 shadow-sm focus:outline-none focus:ring-blue-500 bg-gray-50">
                            <option value="CIF" {{ old('harga_barang_incoterm', $document->harga_barang_incoterm) == 'CIF' ? 'selected' : '' }}>CIF</option>
                        </select>
                        <input type="text" name="harga_barang_nilai" id="harga_barang_nilai" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{ old('harga_barang_nilai', number_format($document->harga_barang_nilai ?? 0, 2)) }}">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nilai Pabean <span class="text-xs text-blue-600">(Auto-calculated)</span>
                    </label>
                    <input type="text" name="nilai_pabean" id="nilai_pabean" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-blue-50 focus:outline-none" value="{{ old('nilai_pabean', number_format($document->nilai_pabean ?? 0, 2)) }}" readonly>
                </div>
            </div>
        </div>
        
        <!-- Biaya Lainnya Card -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Biaya Lainnya</h4>
                    
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Penambah</label>
                    <input type="text" name="biaya_penambah" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" value="{{ old('biaya_penambah', number_format($document->biaya_penambah ?? 0, 2)) }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Biaya Pengurang</label>
                    <input type="text" name="biaya_pengurang" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" value="{{ old('biaya_pengurang', number_format($document->biaya_pengurang ?? 0, 2)) }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Freight 
                        <span class="inline-flex items-center justify-center w-4 h-4 bg-green-500 text-white text-xs rounded-full ml-1">?</span>
                    </label>
                    <input type="text" name="freight" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" value="{{ old('freight', number_format($document->freight ?? 0, 2)) }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Asuransi 
                        <span class="inline-flex items-center justify-center w-4 h-4 bg-green-500 text-white text-xs rounded-full ml-1">?</span>
                    </label>
                    <div class="flex space-x-2">
                        <select name="asuransi_jenis" class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            <option value="LN" {{ old('asuransi_jenis', $document->asuransi_jenis) == 'LN' ? 'selected' : '' }}>LN</option>
                            <option value="DN" {{ old('asuransi_jenis', $document->asuransi_jenis) == 'DN' ? 'selected' : '' }}>DN</option>
                        </select>
                        <input type="text" name="asuransi_nilai" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" value="{{ old('asuransi_nilai', number_format($document->asuransi_nilai ?? 0, 2)) }}">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Voluntary Declaration</label>
                    <input type="text" name="voluntary_declaration" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" value="{{ old('voluntary_declaration', number_format($document->voluntary_declaration ?? 0, 2)) }}">
                </div>
            </div>
        </div>
        
        <!-- Berat Card -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Berat</h4>
                    
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Berat Kotor (KGM) 
                        <span class="inline-flex items-center justify-center w-4 h-4 bg-purple-500 text-white text-xs rounded-full ml-1">?</span>
                    </label>
                    <input type="text" name="berat_kotor" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500" value="{{ old('berat_kotor', number_format($document->berat_kotor ?? 0, 4)) }}">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Berat Bersih (KGM)</label>
                    <input type="text" name="berat_bersih" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500" value="{{ old('berat_bersih', number_format($document->berat_bersih ?? 0, 4)) }}">
                </div>
                               
            </div>
        </div>
    </div>
    
    
    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors" onclick="document.querySelector('[data-tab=\'kemasan\']').click()">
            ← Sebelumnya
        </button>
        <button type="button" id="save-transaksi-btn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
            <span class="btn-text">Berikutnya →</span>
            <span class="btn-loading hidden">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            </span>
        </button>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to calculate Nilai Pabean
    function calculateNilaiPabean() {
        const ndpbmInput = document.getElementById('ndpbm');
        const hargaBarangInput = document.getElementById('harga_barang_nilai');
        const nilaiPabeanInput = document.getElementById('nilai_pabean');
        
        if (!ndpbmInput || !hargaBarangInput || !nilaiPabeanInput) return;
        
        // Get values and clean them (remove commas and formatting)
        const ndpbmValue = parseFloat(ndpbmInput.value.replace(/,/g, '')) || 0;
        const hargaBarangValue = parseFloat(hargaBarangInput.value.replace(/,/g, '')) || 0;
        
        // Calculate Nilai Pabean = NDPBM × Harga Barang
        const nilaiPabean = ndpbmValue * hargaBarangValue;
        
        // Format and set the result
        nilaiPabeanInput.value = new Intl.NumberFormat('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(nilaiPabean);
    }
    
    // Add event listeners for automatic calculation
    const ndpbmInput = document.getElementById('ndpbm');
    const hargaBarangInput = document.getElementById('harga_barang_nilai');
    
    if (ndpbmInput) {
        ndpbmInput.addEventListener('input', calculateNilaiPabean);
        ndpbmInput.addEventListener('blur', calculateNilaiPabean);
    }
    
    if (hargaBarangInput) {
        hargaBarangInput.addEventListener('input', calculateNilaiPabean);
        hargaBarangInput.addEventListener('blur', calculateNilaiPabean);
    }
    
    // Calculate on page load
    calculateNilaiPabean();

    const saveBtn = document.getElementById('save-transaksi-btn');
    const btnText = saveBtn.querySelector('.btn-text');
    const btnLoading = saveBtn.querySelector('.btn-loading');
    
    saveBtn.addEventListener('click', function() {
        // Show loading state
        btnText.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        saveBtn.disabled = true;
        
        // Collect form data
        const formData = new FormData();
        
        // Collect all form fields in the transaksi tab
        const transaksiContent = document.getElementById('transaksi-content');
        const inputs = transaksiContent.querySelectorAll('input[name], select[name], textarea[name]');
        
        inputs.forEach(input => {
            if (input.name) {
                // Clean numeric values (remove commas and formatting)
                if (input.type === 'text' && input.name.includes('nilai') || 
                    input.name.includes('biaya') || input.name.includes('harga') || 
                    input.name.includes('berat') || input.name.includes('ndpbm') ||
                    input.name.includes('freight') || input.name.includes('asuransi_nilai') || 
                    input.name.includes('voluntary')) {
                    let cleanValue = input.value.replace(/,/g, '');
                    formData.append(input.name, cleanValue);
                } else {
                    formData.append(input.name, input.value);
                }
            }
        });
        
        // Add CSRF token
        const token = document.querySelector('meta[name="csrf-token"]');
        if (token) {
            formData.append('_token', token.getAttribute('content'));
        }
        
        // Add method for PATCH
        formData.append('_method', 'PATCH');
        
        // Get document ID from URL or a hidden field
        const documentId = getDocumentId();
        
        // Send AJAX request
        fetch(`/documents/${documentId}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                showNotification('Data transaksi berhasil disimpan!', 'success');
                
                // Navigate to next tab after a short delay
                setTimeout(() => {
                    document.querySelector('[data-tab="barang"]').click();
                }, 500);
            } else {
                showNotification(data.message || 'Terjadi kesalahan saat menyimpan data.', 'error');
                console.error('Save errors:', data.errors);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Terjadi kesalahan saat menyimpan data.', 'error');
        })
        .finally(() => {
            // Reset button state
            btnText.classList.remove('hidden');
            btnLoading.classList.add('hidden');
            saveBtn.disabled = false;
        });
    });
    
    function getDocumentId() {
        // Try to get document ID from URL
        const pathParts = window.location.pathname.split('/');
        const documentsIndex = pathParts.findIndex(part => part === 'documents');
        
        if (documentsIndex !== -1 && pathParts[documentsIndex + 1]) {
            return pathParts[documentsIndex + 1];
        }
        
        // Fallback: try to get from a data attribute or hidden field
        const documentIdEl = document.querySelector('[data-document-id]');
        if (documentIdEl) {
            return documentIdEl.getAttribute('data-document-id');
        }
        
        // Last resort: check for hidden input
        const hiddenInput = document.querySelector('input[name="document_id"]');
        if (hiddenInput) {
            return hiddenInput.value;
        }
        
        console.error('Could not determine document ID');
        return null;
    }
    
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 max-w-sm w-full p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.innerHTML = `
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    ${type === 'success' 
                        ? '<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>'
                        : '<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>'
                    }
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium">${message}</p>
                </div>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
});
</script>
</div>
