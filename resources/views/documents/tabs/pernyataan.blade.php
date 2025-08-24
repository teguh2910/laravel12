<div id="pernyataan-content" class="tab-content p-6 hidden">
    <h3 class="text-lg font-medium text-gray-900 mb-6">Pernyataan</h3>
    
    <!-- Declaration Statement -->
    <div class="mb-6">
        <div class="bg-gray-50 p-4 rounded-lg border">
            <h4 class="font-medium text-gray-900 mb-3">Dengan ini saya menyatakan:</h4>
            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>a.</strong> bertanggung jawab atas kebenaran hal-hal yang diberitahukan dalam dokumen ini dan keabsahan dokumen pelengkap pabean yang menjadi dasar pembuatan dokumen ini; dan</p>
                <p><strong>b.</strong> apabila dalam jangka waktu paling lambat 1 (satu) hari setelah tanggal pemberitahuan kesiapan barang, saya tidak hadir untuk menyaksikan pemeriksaan fisik, maka saya menguasakan penyaksian kepada pengusaha TPS dengan resiko dan biaya menjadi tanggung jawab saya.</p>
            </div>
        </div>
    </div>

    <!-- Declaration Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="pernyataan_tempat" class="block text-sm font-medium text-gray-700 mb-2">Tempat</label>
            <input 
                type="text" 
                id="pernyataan_tempat" 
                name="pernyataan_tempat" 
                value="{{ old('pernyataan_tempat', $document->pernyataan_tempat ?? 'BEKASI') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Masukkan tempat"
            >
        </div>
        
        <div>
            <label for="pernyataan_tanggal" class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
            <input 
                type="date" 
                id="pernyataan_tanggal" 
                name="pernyataan_tanggal" 
                value="{{ old('pernyataan_tanggal', $document->pernyataan_tanggal?->format('Y-m-d') ?? date('Y-m-d')) }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <label for="pernyataan_nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
            <input 
                type="text" 
                id="pernyataan_nama" 
                name="pernyataan_nama" 
                value="{{ old('pernyataan_nama', $document->pernyataan_nama ?? 'HERLINA TRISNAWATI') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Masukkan nama"
            >
        </div>
        
        <div>
            <label for="pernyataan_jabatan" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
            <input 
                type="text" 
                id="pernyataan_jabatan" 
                name="pernyataan_jabatan" 
                value="{{ old('pernyataan_jabatan', $document->pernyataan_jabatan ?? 'DIREKTUR') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Masukkan jabatan"
            >
        </div>
    </div>
    
    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'pungutan\']').click()">
            Sebelumnya
        </button>
        <button type="button" id="save-final-button" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
            Selesai & Simpan Dokumen
        </button>
    </div>
</div>
