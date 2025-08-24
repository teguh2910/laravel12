<div id="header-content" class="tab-content p-6">
    <!-- Header Tab Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Pengajuan Section -->
        <div class="space-y-4">
            <h4 class="text-base font-medium text-gray-900 mb-4">Pengajuan</h4>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Aju
                    <span class="text-xs text-gray-500">(Auto Generated)</span>
                </label>
                <input type="text" 
                       name="nomor_aju" 
                       id="nomor_aju" 
                       value="{{ old('nomor_aju', $document->nomor_aju ?? '') }}" 
                       readonly
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 cursor-not-allowed focus:outline-none">
                <div class="mt-1 flex justify-between items-center">
                    <p class="text-xs text-gray-500">Format: 000020010653YYYYMMDD######</p>
                    <button type="button" 
                            onclick="regenerateNomorAju()" 
                            class="text-xs text-blue-600 hover:text-blue-800 underline">
                        Regenerate
                    </button>
                </div>
            </div>
        </div>

        <!-- Kantor Pabean Section -->
        <div class="space-y-4">
            <h4 class="text-base font-medium text-gray-900 mb-4">Kantor Pabean</h4>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Pelabuhan Tujuan
                </label>
                <select name="pelabuhan_tujuan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Pelabuhan Tujuan</option>
                    <option value="IDTPP" {{ old('pelabuhan_tujuan', $document->pelabuhan_tujuan ?? '') == 'IDTPP' ? 'selected' : '' }}>IDTPP - TANJUNG PRIOK</option>
                    <option value="IDCGK" {{ old('pelabuhan_tujuan', $document->pelabuhan_tujuan ?? '') == 'IDCGK' ? 'selected' : '' }}>IDCGK - SOEKARNO HATTA</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Kantor Pabean
                </label>
                <select name="kantor_pabean" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Kantor Pabean</option>
                    <option value="040300" {{ old('kantor_pabean', $document->kantor_pabean ?? '') == '040300' ? 'selected' : '' }}>040300 - KPU BEA DAN CUKAI TIPE A TJ. PRIOK</option>
                    <option value="050100" {{ old('kantor_pabean', $document->kantor_pabean ?? '') == '050100' ? 'selected' : '' }}>050100 - KPU BEA DAN CUKAI SOEKARNO HATTA</option>
                </select>
            </div>
        </div>

        <!-- Keterangan Lain Section -->
        <div class="space-y-4">
            <h4 class="text-base font-medium text-gray-900 mb-4">Keterangan Lain</h4>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis PIB
                </label>
                <select name="jenis_pib" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Jenis PIB</option>
                    <option value="1" {{ old('jenis_pib', $document->jenis_pib ?? '') == '1' ? 'selected' : '' }}>1 - BIASA</option>
                    <option value="2" {{ old('jenis_pib', $document->jenis_pib ?? '') == '2' ? 'selected' : '' }}>2 - BERKALA</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Jenis Impor
                </label>
                <select name="jenis_impor" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Jenis Impor</option>
                    <option value="1" {{ old('jenis_impor', $document->jenis_impor ?? '') == '1' ? 'selected' : '' }}>1 - UNTUK DIPAKAI</option>
                    <option value="2" {{ old('jenis_impor', $document->jenis_impor ?? '') == '2' ? 'selected' : '' }}>2 - SEMENTARA</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Cara Pembayaran
                    <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi cara pembayaran">?</span>
                </label>
                <select name="cara_pembayaran" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Cara Pembayaran</option>
                    <option value="2" {{ old('cara_pembayaran', $document->cara_pembayaran ?? '') == '2' ? 'selected' : '' }}>2 - BERKALA</option>
                    <option value="1" {{ old('cara_pembayaran', $document->cara_pembayaran ?? '') == '1' ? 'selected' : '' }}>1 - BIASA</option>

                </select>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-end mt-8 pt-6 border-gray-200">
        <button type="button" id="save-header-next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50" onclick="saveHeaderAndNext()">
            <span id="btn-text">Berikutnya</span>
            <span id="btn-loading" class="hidden">
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
    // Auto-generate nomor_aju if empty
    const nomorAjuInput = document.getElementById('nomor_aju');
    if (!nomorAjuInput.value.trim()) {
        generateNomorAju();
    }
});

function generateNomorAju() {
    fetch('/documents/generate-nomor-aju', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('nomor_aju').value = data.nomor_aju;
        }
    })
    .catch(error => {
        console.error('Error generating nomor_aju:', error);
    });
}

function regenerateNomorAju() {
    if (confirm('Are you sure you want to generate a new Nomor Aju? The current one will be replaced.')) {
        generateNomorAju();
    }
}
</script>
