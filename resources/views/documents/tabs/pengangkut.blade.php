<div id="pengangkut-content" class="tab-content p-6 hidden">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- BC 1.1 Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-base font-medium text-gray-900">BC 1.1</h4>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Tutup PU
                    </label>
                    <div class="flex gap-2">
                        <select name="nomor_tutup_pu_type" class="w-24 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="BC 1.1" selected>BC 1.1</option>
                        </select>
                        <input type="text" name="nomor_tutup_pu" value="{{ old('nomor_tutup_pu', $document->nomor_tutup_pu ?? '') }}" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Pos
                    </label>
                    <input type="text" name="nomor_pos" value="{{ old('nomor_pos', $document->nomor_pos ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Pengangkutan Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-base font-medium text-gray-900">Pengangkutan</h4>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Cara Pengangkutan
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi cara pengangkutan">?</span>
                    </label>
                    <select name="cara_pengangkutan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih cara pengangkutan</option>
                        <option value="1" {{ old('cara_pengangkutan', $document->cara_pengangkutan ?? '') == '1' ? 'selected' : '' }}>1 - LAUT</option>
                        <option value="2" {{ old('cara_pengangkutan', $document->cara_pengangkutan ?? '') == '2' ? 'selected' : '' }}>2 - UDARA</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Sarana Angkut
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi nama sarana angkut">?</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="nama_sarana_angkut" value="{{ old('nama_sarana_angkut', $document->nama_sarana_angkut ?? '') }}" class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nomor Voy/Flight/Nopol/Lainnya
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi nomor perjalanan">?</span>
                    </label>
                    <div class="relative">
                        <input type="text" name="nomor_voy" value="{{ old('nomor_voy', $document->nomor_voy ?? '') }}" class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Bendera
                    </label>
                    <select name="bendera" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih bendera</option>
                        <option value="LR" {{ old('bendera', $document->bendera ?? '') == 'LR' ? 'selected' : '' }}>LR - LIBERIA</option>
                        <option value="SG" {{ old('bendera', $document->bendera ?? '') == 'SG' ? 'selected' : '' }}>SG - SINGAPORE</option>
                        <option value="ID" {{ old('bendera', $document->bendera ?? '') == 'ID' ? 'selected' : '' }}>ID - INDONESIA</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Perkiraan Tanggal Tiba
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi perkiraan tanggal tiba">?</span>
                    </label>
                    <input type="date" name="tanggal_tiba" value="{{ old('tanggal_tiba', $document->tanggal_tiba ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>

        <!-- Pelabuhan & Tempat Penimbunan Section -->
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h4 class="text-base font-medium text-gray-900">Pelabuhan & Tempat Penimbunan</h4>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pelabuhan Muat
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi pelabuhan muat">?</span>
                    </label>
                    <select name="pelabuhan_muat" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih pelabuhan muat</option>
                        <option value="JPTYO" {{ old('pelabuhan_muat', $document->pelabuhan_muat ?? '') == 'JPTYO' ? 'selected' : '' }}>JPTYO - TOKYO</option>
                        <option value="SGSIN" {{ old('pelabuhan_muat', $document->pelabuhan_muat ?? '') == 'SGSIN' ? 'selected' : '' }}>SGSIN - SINGAPORE</option>
                        <option value="USNYC" {{ old('pelabuhan_muat', $document->pelabuhan_muat ?? '') == 'USNYC' ? 'selected' : '' }}>USNYC - NEW YORK</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pelabuhan Transit
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi pelabuhan transit">?</span>
                    </label>
                    <select name="pelabuhan_transit" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih pelabuhan transit</option>
                        <option value="SGSIN" {{ old('pelabuhan_transit', $document->pelabuhan_transit ?? '') == 'SGSIN' ? 'selected' : '' }}>SGSIN - SINGAPORE</option>
                        <option value="JPTYO" {{ old('pelabuhan_transit', $document->pelabuhan_transit ?? '') == 'JPTYO' ? 'selected' : '' }}>JPTYO - TOKYO</option>
                        <option value="HKHKG" {{ old('pelabuhan_transit', $document->pelabuhan_transit ?? '') == 'HKHKG' ? 'selected' : '' }}>HKHKG - HONG KONG</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pelabuhan Tujuan
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Pelabuhan tujuan diambil dari pengaturan header">?</span>
                    </label>
                    @php
                        $pelabuhan_tujuan_value = old('pelabuhan_tujuan', $document->pelabuhan_tujuan ?? '');
                        $pelabuhan_display = '';
                        switch($pelabuhan_tujuan_value) {
                            case 'IDTPP':
                                $pelabuhan_display = 'IDTPP - TANJUNG PRIOK';
                                break;
                            case 'IDCGK':
                                $pelabuhan_display = 'IDCGK - SOEKARNO HATTA';
                                break;
                            default:
                                $pelabuhan_display = $pelabuhan_tujuan_value ? $pelabuhan_tujuan_value : 'Belum dipilih di header';
                        }
                    @endphp
                    <input type="hidden" name="pelabuhan_tujuan" value="{{ $pelabuhan_tujuan_value }}">
                    <input type="text" value="{{ $pelabuhan_display }}" readonly class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 cursor-not-allowed focus:outline-none">
                    <p class="text-xs text-gray-500 mt-1">Pelabuhan tujuan diambil dari pengaturan di tab Header</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tempat Penimbunan
                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi tempat penimbunan">?</span>
                    </label>
                    <select name="tempat_penimbunan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih tempat penimbunan</option>
                        <option value="TPK1 - UTPK I - JICT, PT" {{ old('tempat_penimbunan', $document->tempat_penimbunan ?? '') == 'TPK1 - UTPK I - JICT, PT' ? 'selected' : '' }}>TPK1 - UTPK I - JICT, PT</option>
                        <option value="TPK2 - UTPK II" {{ old('tempat_penimbunan', $document->tempat_penimbunan ?? '') == 'TPK2 - UTPK II' ? 'selected' : '' }}>TPK2 - UTPK II</option>
                        <option value="TPK3 - UTPK III" {{ old('tempat_penimbunan', $document->tempat_penimbunan ?? '') == 'TPK3 - UTPK III' ? 'selected' : '' }}>TPK3 - UTPK III</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'dokumen\']').click()">
            Sebelumnya
        </button>
        <div class="flex gap-3">
            <button type="button" id="savePengangkutBtn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-green-700" onclick="savePengangkutAndNext()">
                <span id="savePengangkutBtnText">Berikutnya</span>
                <div id="savePengangkutBtnLoading" class="hidden items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                </div>
            </button>
        </div>
    </div>
</div>
