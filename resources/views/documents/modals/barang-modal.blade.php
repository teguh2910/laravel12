<!-- Barang Modal -->
<div id="barang-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 overflow-hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] flex flex-col">
            <!-- Fixed Header -->
            <div class="flex-shrink-0 px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900" id="modal-title">Tambah Barang</h3>
                    <button type="button" id="close-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto px-6 py-4" style="max-height: calc(90vh - 140px);">
                <form id="barang-form" class="space-y-6">
                <input type="hidden" id="barang-id" name="barang_id">
                <input type="hidden" id="document-id" name="document_id" value="{{ $document->id }}">
                
                <!-- Display seri number for edit mode only -->
                <div id="seri-display" class="hidden mb-4">
                    <label class="block text-sm font-medium text-gray-700">Seri (Auto-generated)</label>
                    <div class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600" id="seri-value">-</div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <div>
                        <label for="pos_tarif_hs" class="block text-sm font-medium text-gray-700">Pos Tarif/HS</label>
                        <input type="text" id="pos_tarif_hs" name="pos_tarif_hs" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="pos_tarif_hs-error"></div>
                    </div>
                </div>
                
                <!-- Lartas Section -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Informasi Lartas</h4>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pernyataan Lartas</label>
                            <div class="flex gap-4">
                                <div class="flex items-center">
                                    <input type="radio" id="terkena_lartas" name="pernyataan_lartas" value="terkena" class="mr-2">
                                    <label for="terkena_lartas" class="text-sm text-gray-700">Terkena Lartas</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="tidak_terkena_lartas" name="pernyataan_lartas" value="tidak_terkena" class="mr-2">
                                    <label for="tidak_terkena_lartas" class="text-sm text-gray-700">Tidak Terkena Lartas</label>
                                </div>
                            </div>
                            <div class="text-red-500 text-xs mt-1 hidden" id="pernyataan_lartas-error"></div>
                        </div>
                        
                        
                    </div>
                </div>
                
                <!-- Basic Information Section -->
                <div class="bg-blue-50 p-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Informasi Dasar</h4>
                    
                    <div>
                        <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang</label>
                        <input type="text" id="kode_barang" name="kode_barang" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="kode_barang-error"></div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="uraian_jenis_barang" class="block text-sm font-medium text-gray-700">Uraian Jenis Barang</label>
                        <textarea id="uraian_jenis_barang" name="uraian_jenis_barang" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" placeholder="Masukkan uraian jenis barang"></textarea>
                        <div class="text-red-500 text-xs mt-1 hidden" id="uraian_jenis_barang-error"></div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="spesifikasi_lain" class="block text-sm font-medium text-gray-700">Spesifikasi Lain</label>
                        <input type="text" id="spesifikasi_lain" name="spesifikasi_lain" placeholder="BARU/BAIK" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="spesifikasi_lain-error"></div>
                    </div>
                </div>
                
                <!-- Product Details Section -->
                <div class="bg-green-50 p-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Detail Produk</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="kondisi_barang" class="block text-sm font-medium text-gray-700">Kondisi Barang</label>
                            <select id="kondisi_barang" name="kondisi_barang" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Pilih Kondisi</option>
                                <option value="barang_baru">Barang Baru</option>
                                <option value="barang_bekas">Barang Bekas</option>
                            </select>
                            <div class="text-red-500 text-xs mt-1 hidden" id="kondisi_barang-error"></div>
                        </div>
                        
                        <div>
                            <label for="negara_asal" class="block text-sm font-medium text-gray-700">Negara Asal</label>
                            <select id="negara_asal" name="negara_asal" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Pilih Negara</option>
                                <option value="JP">JP - JAPAN</option>
                                <option value="US">US - UNITED STATES</option>
                                <option value="CN">CN - CHINA</option>
                                <option value="KR">KR - SOUTH KOREA</option>
                                <option value="SG">SG - SINGAPORE</option>
                                <option value="MY">MY - MALAYSIA</option>
                                <option value="TH">TH - THAILAND</option>
                                <option value="DE">DE - GERMANY</option>
                                <option value="IT">IT - ITALY</option>
                                <option value="GB">GB - UNITED KINGDOM</option>
                            </select>
                            <div class="text-red-500 text-xs mt-1 hidden" id="negara_asal-error"></div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="berat_bersih" class="block text-sm font-medium text-gray-700">Berat Bersih (Kg)</label>
                        <input type="number" step="0.001" id="berat_bersih" name="berat_bersih" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="berat_bersih-error"></div>
                    </div>
                </div>
                
                <!-- Quantity & Packaging Section -->
                <div class="bg-yellow-50 p-4 rounded-lg">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Jumlah & Kemasan</h4>
                    
                    <div>
                        <div>
                            <label for="jumlah_satuan" class="block text-sm font-medium text-gray-700">Jumlah Satuan Barang</label>
                            <input type="number" step="0.01" id="jumlah_satuan" name="jumlah_satuan" placeholder="Jumlah" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <div class="text-red-500 text-xs mt-1 hidden" id="jumlah_satuan-error"></div>
                        </div>
                        
                        <div>
                            <label for="jenis_satuan" class="block text-sm font-medium text-gray-700">Jenis Satuan</label>
                            <select id="jenis_satuan" name="jenis_satuan" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Pilih Satuan</option>
                                <option value="PCE">PCE - PIECE</option>
                                <option value="SET">SET - SET</option>
                                <option value="KG">KG - KILOGRAM</option>
                                <option value="PCS">PCS - PIECES</option>
                                <option value="UNIT">UNIT - UNIT</option>
                                <option value="BTLS">BTLS - BOTTLES</option>
                                <option value="PACK">PACK - PACKAGE</option>
                            </select>
                            <div class="text-red-500 text-xs mt-1 hidden" id="jenis_satuan-error"></div>
                        </div>
                        
                        <div>
                            <div>
                            <label for="jumlah_kemasan" class="block text-sm font-medium text-gray-700">Jumlah Kemasan</label>
                            <input type="number" step="0.01" id="jumlah_kemasan" name="jumlah_kemasan" placeholder="Jumlah" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <div class="text-red-500 text-xs mt-1 hidden" id="jumlah_kemasan-error"></div>
                        </div>
                            <label for="kemasan" class="block text-sm font-medium text-gray-700">Kemasan</label>
                            <select id="kemasan" name="kemasan" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Pilih Kemasan</option>
                                <option value="BX">BX - BOX</option>
                                <option value="CT">CT - CARTON</option>
                                <option value="PK">PK - PACKAGE</option>
                                <option value="BG">BG - BAG</option>
                                <option value="PC">PC - PIECE</option>
                            </select>
                            <div class="text-red-500 text-xs mt-1 hidden" id="kemasan-error"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Financial Information -->
                <div class="bg-purple-50 p-4 rounded-lg border-t-4 border-purple-400">
                    <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        Informasi Nilai & Keuangan
                    </h4>
                    
                    <div class="mb-4">
                        <label for="nilai_barang" class="block text-sm font-medium text-gray-700">Nilai Barang (Amount)</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            
                            <input type="number" step="0.01" id="nilai_barang" name="nilai_barang" placeholder="0.00" class="pl-7 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        </div>
                        <div class="text-red-500 text-xs mt-1 hidden" id="nilai_barang-error"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="fob" class="block text-sm font-medium text-gray-700">
                                FOB 
                                <span class="text-xs text-blue-500">(Auto-calculated)</span>
                            </label>
                            <input type="number" step="0.01" id="fob" name="fob" readonly class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none">
                            <div class="text-red-500 text-xs mt-1 hidden" id="fob-error"></div>
                        </div>
                        
                        <div>
                            <label for="freight" class="block text-sm font-medium text-gray-700">Freight</label>
                            <input type="number" step="0.01" id="freight" name="freight" value="0.00" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <div class="text-red-500 text-xs mt-1 hidden" id="freight-error"></div>
                        </div>
                        
                        <div>
                            <label for="asuransi" class="block text-sm font-medium text-gray-700">Asuransi</label>
                            <input type="number" step="0.01" id="asuransi" name="asuransi" value="0.00" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                            <div class="text-red-500 text-xs mt-1 hidden" id="asuransi-error"></div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="harga_per_satuan" class="block text-sm font-medium text-gray-700">
                                Harga Per Satuan 
                                <span class="text-xs text-blue-500">(Auto-calculated)</span>
                            </label>
                            <input type="number" step="0.01" id="harga_per_satuan" name="harga_per_satuan" readonly class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none">
                            <div class="text-red-500 text-xs mt-1 hidden" id="harga_per_satuan-error"></div>
                        </div>
                        
                        <div>
                            <label for="nilai_pabean_rupiah" class="block text-sm font-medium text-gray-700">
                                Nilai Pabean Rupiah 
                                <span class="text-xs text-blue-500">(Nilai Barang × NDPBM)</span>
                            </label>
                            <input type="number" step="0.01" id="nilai_pabean_rupiah" name="nilai_pabean_rupiah" readonly class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none">
                            <div class="text-red-500 text-xs mt-1 hidden" id="nilai_pabean_rupiah-error"></div>
                        </div>
                    </div>
                    <div class="mt-4">
                            <label for="dokumen_fasilitas_lartas" class="block text-sm font-medium text-gray-700 mb-2">Dokumen Fasilitas/Lartas</label>
                            <select id="dokumen_fasilitas_lartas" name="dokumen_fasilitas_lartas" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Pilih Dokumen Fasilitas/Lartas</option>
                                <!-- Options will be populated from dokumen tab -->
                            </select>
                            <div class="text-red-500 text-xs mt-1 hidden" id="dokumen_fasilitas_lartas-error"></div>
                            <div class="text-xs text-gray-500 mt-1">
                                <span class="text-blue-600 cursor-pointer" onclick="switchToDokumenTab()">+ Tambah dokumen baru</span>
                            </div>
                        </div>
                </div>
                
                <!-- Pungutan Section -->
                <div class="bg-red-50 p-4 rounded-lg border-t-4 border-red-400">
                    <h4 class="text-md font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        Pungutan
                    </h4>
                    
                    <div>
                        <div>
                            <label for="bm" class="block text-sm font-medium text-gray-700">
                                BM (Bea Masuk)
                            </label>
                            <div class="mt-1 flex">
                                <input type="number" step="0.01" id="bm_rate" name="bm_rate" placeholder="0" class="block w-20 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <span class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">%</span>
                                <select id="bm_type" name="bm_type" class="block flex-1 border border-l-0 border-gray-300 rounded-r-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="1">DIBAYAR</option>
                                    <option value="2">TIDAK DIBAYAR</option>
                                    <option value="3">BEBAS</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <input type="text" id="bm_amount" name="bm_amount" placeholder="100%" readonly class="block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none text-sm">
                            </div>
                            <div class="text-red-500 text-xs mt-1 hidden" id="bm-error"></div>
                        </div>
                        
                        <div>
                            <label for="ppn" class="block text-sm font-medium text-gray-700">
                                PPN (DPP 11/12)
                            </label>
                            <div class="mt-1 flex">
                                <input type="number" step="0.01" id="ppn_rate" name="ppn_rate" value="12" class="block w-20 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <span class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">%</span>
                                <select id="ppn_type" name="ppn_type" class="block flex-1 border border-l-0 border-gray-300 rounded-r-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="1">DIBAYAR</option>
                                    <option value="2">TIDAK DIBAYAR</option>
                                    <option value="3">BEBAS</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <input type="text" id="ppn_amount" name="ppn_amount" placeholder="100%" readonly class="block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none text-sm">
                            </div>
                            <div class="text-red-500 text-xs mt-1 hidden" id="ppn-error"></div>
                        </div>
                        
                        <div>
                            <label for="pph" class="block text-sm font-medium text-gray-700">
                                PPH
                            </label>
                            <div class="mt-1 flex">
                                <input type="number" step="0.01" id="pph_rate" name="pph_rate" value="2.5" class="block w-20 border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <span class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">%</span>
                                <select id="pph_type" name="pph_type" class="block flex-1 border border-l-0 border-gray-300 rounded-r-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <option value="1">DIBAYAR</option>
                                    <option value="2">TIDAK DIBAYAR</option>
                                    <option value="3">BEBAS</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <input type="text" id="pph_amount" name="pph_amount" placeholder="100%" readonly class="block w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-600 focus:outline-none text-sm">
                            </div>
                            <div class="text-red-500 text-xs mt-1 hidden" id="pph-error"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Fixed Footer -->
        <div class="flex-shrink-0 px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex justify-end gap-3">
                <button type="button" id="cancel-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
                    Batal
                </button>
                <button type="submit" form="barang-form" id="save-btn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    Simpan
                </button>
            </div>
        </div>
        
    </div>
</div>

<style>
/* Ensure scrollbar is always visible and styled */
#barang-modal .overflow-y-auto {
    scrollbar-width: auto;
    scrollbar-color: #cbd5e0 #f7fafc;
}

#barang-modal .overflow-y-auto::-webkit-scrollbar {
    width: 12px;
    background-color: #f7fafc;
}

#barang-modal .overflow-y-auto::-webkit-scrollbar-track {
    background-color: #f7fafc;
    border-radius: 6px;
}

#barang-modal .overflow-y-auto::-webkit-scrollbar-thumb {
    background-color: #cbd5e0;
    border-radius: 6px;
    border: 2px solid #f7fafc;
}

#barang-modal .overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background-color: #a0aec0;
}

#barang-modal .overflow-y-auto::-webkit-scrollbar-thumb:active {
    background-color: #718096;
}

/* Force minimum content height to ensure scrollbar appears */
#barang-modal form.space-y-6 {
    min-height: 600px;
}

/* Ensure modal centers properly */
#barang-modal {
    padding: 20px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-calculation functions
    function calculateValues() {
        const nilaiBarang = parseFloat(document.getElementById('nilai_barang')?.value) || 0;
        const jumlahSatuan = parseFloat(document.getElementById('jumlah_satuan')?.value) || 0;
        const freight = parseFloat(document.getElementById('freight')?.value) || 0;
        const asuransi = parseFloat(document.getElementById('asuransi')?.value) || 0;
        
        // Calculate FOB (same as nilai barang for now)
        const fob = nilaiBarang;
        if (document.getElementById('fob')) {
            document.getElementById('fob').value = fob.toFixed(2);
        }
        
        // Calculate harga per satuan
        if (jumlahSatuan > 0) {
            const hargaPerSatuan = nilaiBarang / jumlahSatuan;
            if (document.getElementById('harga_per_satuan')) {
                document.getElementById('harga_per_satuan').value = hargaPerSatuan.toFixed(2);
            }
        }
        
        // Calculate nilai pabean rupiah using NDPBM from transaksi tab
        const ndpbmInput = document.getElementById('ndpbm');
        const ndpbmValue = ndpbmInput ? parseFloat(ndpbmInput.value.replace(/,/g, '')) || 0 : 15000;
        
        // Nilai Pabean Rupiah = Nilai Barang (Amount) × NDPBM
        const nilaiPabeanRupiah = nilaiBarang * ndpbmValue;
        if (document.getElementById('nilai_pabean_rupiah')) {
            document.getElementById('nilai_pabean_rupiah').value = nilaiPabeanRupiah.toFixed(2);
        }
    }
    
    // Add event listeners for auto-calculation
    setTimeout(function() {
        const nilaiBarangInput = document.getElementById('nilai_barang');
        const jumlahSatuanInput = document.getElementById('jumlah_satuan');
        const freightInput = document.getElementById('freight');
        const asuransiInput = document.getElementById('asuransi');
        const ndpbmInput = document.getElementById('ndpbm');
        
        if (nilaiBarangInput) nilaiBarangInput.addEventListener('input', calculateValues);
        if (jumlahSatuanInput) jumlahSatuanInput.addEventListener('input', calculateValues);
        if (freightInput) freightInput.addEventListener('input', calculateValues);
        if (asuransiInput) asuransiInput.addEventListener('input', calculateValues);
        
        // Listen for NDPBM changes from transaksi tab
        if (ndpbmInput) {
            ndpbmInput.addEventListener('input', calculateValues);
            ndpbmInput.addEventListener('change', calculateValues);
        }
        
        // Also listen for when modal is opened to recalculate with current NDPBM
        const modal = document.getElementById('barang-modal');
        if (modal) {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        if (!modal.classList.contains('hidden')) {
                            // Modal opened, recalculate values
                            setTimeout(calculateValues, 100);
                        }
                    }
                });
            });
            observer.observe(modal, { attributes: true });
        }
    }, 100);
    
    // Function to populate Dokumen Fasilitas/Lartas dropdown from existing documents
    window.populateDokumenFasilitasOptions = function() {
        const select = document.getElementById('dokumen_fasilitas_lartas');
        if (!select) return;
        
        // Clear existing options except the first one
        while (select.children.length > 1) {
            select.removeChild(select.lastChild);
        }
        
        // Get documents from the dokumen tab
        const dokumentTable = document.querySelector('#dokumen-content tbody');
        if (dokumentTable) {
            const rows = dokumentTable.querySelectorAll('tr');
            const documents = [];
            
            rows.forEach((row, index) => {
                const cells = row.querySelectorAll('td');
                if (cells.length >= 4 && cells[1].textContent.trim() !== 'Belum ada dokumen. Klik tombol "Tambah" untuk menambah dokumen.') {
                    const jenis = cells[1].textContent.trim();
                    const nomor = cells[2].textContent.trim();
                    if (jenis && nomor && jenis !== 'N/A') {
                        documents.push({
                            jenis: jenis,
                            nomor: nomor,
                            display: `${jenis} - ${nomor}`
                        });
                    }
                }
            });
            
            // Add documents as options
            documents.forEach((doc) => {
                const option = document.createElement('option');
                option.value = doc.display;
                option.textContent = doc.display;
                select.appendChild(option);
            });
            
            // If no documents found, add a notice
            if (documents.length === 0) {
                const option = document.createElement('option');
                option.value = '';
                option.textContent = 'Belum ada dokumen (tambah di tab Dokumen)';
                option.disabled = true;
                option.style.fontStyle = 'italic';
                select.appendChild(option);
            }
        }
    };
    
    // Function to switch to dokumen tab
    window.switchToDokumenTab = function() {
        // Close the barang modal first
        const barangModal = document.getElementById('barang-modal');
        if (barangModal) {
            barangModal.classList.add('hidden');
        }
        
        // Switch to dokumen tab
        const dokumenTab = document.querySelector('[data-tab="dokumen"]');
        const dokumenContent = document.getElementById('dokumen-content');
        
        if (dokumenTab && dokumenContent) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            
            // Remove active class from all tab buttons
            document.querySelectorAll('[data-tab]').forEach(tab => {
                tab.classList.remove('border-blue-500', 'text-blue-600');
                tab.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Show dokumen tab
            dokumenContent.classList.remove('hidden');
            
            // Add active class to dokumen tab button
            dokumenTab.classList.remove('border-transparent', 'text-gray-500');
            dokumenTab.classList.add('border-blue-500', 'text-blue-600');
        }
    };
    
    // Call populate function when modal opens
    const barangModal = document.getElementById('barang-modal');
    if (barangModal) {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (!barangModal.classList.contains('hidden')) {
                        // Modal opened, populate dokumen options
                        setTimeout(window.populateDokumenFasilitasOptions, 100);
                    }
                }
            });
        });
        observer.observe(barangModal, { attributes: true });
    }
});
</script>
