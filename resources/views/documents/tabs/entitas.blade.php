<div id="entitas-content" class="tab-content p-6 hidden">
    <!-- Entitas Tab Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Importir Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-base font-medium text-gray-900">Importir</h4>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NPWP
                    </label>
                    <input type="text" name="importir_npwp" value="{{ old('importir_npwp', $document->importir_npwp ?? '001065305305500') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NITKU
                    </label>
                    <input type="text" name="importir_nitku" value="{{ old('importir_nitku', $document->importir_nitku ?? '001065305305500000000') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" name="importir_nama" value="{{ old('importir_nama', $document->importir_nama ?? 'AISIN INDONESIA') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="importir_alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('importir_alamat', $document->importir_alamat ?? 'KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        API/NIB
                    </label>
                    <input type="text" name="importir_api" value="{{ old('importir_api', $document->importir_api ?? '8120006810093') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>
                    <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="MITA">MITA</option>
                        <option value="AEO">AEO</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- NPWP Pemusatan Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">NPWP Pemusatan</h4>
                    <button type="button" id="copy-to-pemusatan" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                        Salin Data Importir
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NPWP
                    </label>
                    <input type="text" name="pemusatan_npwp" value="{{ old('pemusatan_npwp', $document->pemusatan_npwp ?? '001065305305500') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NITKU
                    </label>
                    <input type="text" name="pemusatan_nitku" value="{{ old('pemusatan_nitku', $document->pemusatan_nitku ?? '001065305305500000000') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" name="pemusatan_nama" value="{{ old('pemusatan_nama', $document->pemusatan_nama ?? 'AISIN INDONESIA') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="pemusatan_alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('pemusatan_alamat', $document->pemusatan_alamat ?? 'KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Pemilik Barang Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Pemilik Barang</h4>
                    <button type="button" id="copy-to-pemilik" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                        Salin Data Importir
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NPWP
                    </label>
                    <input type="text" name="pemilik_npwp" value="{{ old('pemilik_npwp', $document->pemilik_npwp ?? '001065305305500') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        NITKU
                    </label>
                    <input type="text" name="pemilik_nitku" value="{{ old('pemilik_nitku', $document->pemilik_nitku ?? '001065305305500000000') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" name="pemilik_nama" value="{{ old('pemilik_nama', $document->pemilik_nama ?? 'AISIN INDONESIA') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="pemilik_alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('pemilik_alamat', $document->pemilik_alamat ?? 'KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT') }}</textarea>
                </div>
            </div>
        </div>
        <!-- Pengirim Barang Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Pengirim Barang</h4>
                    <button type="button" id="pengirimReferenceBtn" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                        Data Referensi
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" name="pengirim_nama" value="{{ old('pengirim_nama', $document->pengirim_nama ) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="pengirim_alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('pengirim_alamat', $document->pengirim_alamat ) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Negara
                    </label>
                    <select name="pengirim_negara" id="pengirim_negara" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="sg">SINGAPORE</option>
                        <option value="jp">JAPAN</option>
                    </select>    
                </div>                
            </div>
        </div>
        <!-- Penjual Barang Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h4 class="text-base font-medium text-gray-900">Penjual Barang</h4>
                    <button type="button" id="penjualReferenceBtn" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                        Data Referensi
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-4">
                                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama
                    </label>
                    <input type="text" name="penjual_nama" value="{{ old('penjual_nama', $document->penjual_nama ) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea name="penjual_alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('penjual_alamat', $document->penjual_alamat ) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Negara
                    </label>
                    <select name="penjual_negara" id="penjual_negara" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="sg">SINGAPORE</option>
                        <option value="jp">JAPAN</option>
                    </select>    
                </div>

                
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'header\']').click()">
            Sebelumnya
        </button>
        <button type="button" id="save-entitas-next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50" onclick="saveEntitasAndNext()">
            <span id="btn-entitas-text">Berikutnya</span>
            <span id="btn-entitas-loading" class="hidden">
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            </span>
        </button>
    </div>
</div>

<!-- Include Reference Data Modal -->
@include('components.reference-data-modal')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Pengirim Barang Reference Button
    document.getElementById('pengirimReferenceBtn').addEventListener('click', function() {
        if (window.referenceDataModal) {
            window.referenceDataModal.open('pengirim', function(data) {
                // Fill the pengirim barang fields
                document.querySelector('input[name="pengirim_nama"]').value = data.nama;
                document.querySelector('textarea[name="pengirim_alamat"]').value = data.alamat;
                document.querySelector('select[name="pengirim_negara"]').value = data.negara;
            });
        }
    });

    // Penjual Barang Reference Button
    document.getElementById('penjualReferenceBtn').addEventListener('click', function() {
        if (window.referenceDataModal) {
            window.referenceDataModal.open('penjual', function(data) {
                // Fill the penjual barang fields
                document.querySelector('input[name="penjual_nama"]').value = data.nama;
                document.querySelector('textarea[name="penjual_alamat"]').value = data.alamat;
                document.querySelector('select[name="penjual_negara"]').value = data.negara;
            });
        }
    });
});
</script>
