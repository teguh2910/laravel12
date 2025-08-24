<!-- Barang Modal -->
<div id="barang-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modal-title">Tambah Barang</h3>
                <button type="button" id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="barang-form" class="space-y-4">
                <input type="hidden" id="barang-id" name="barang_id">
                <input type="hidden" id="document-id" name="document_id" value="{{ $document->id }}">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="seri" class="block text-sm font-medium text-gray-700">Seri</label>
                        <input type="number" id="seri" name="seri" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="seri-error"></div>
                    </div>
                    
                    <div>
                        <label for="pos_tarif_hs" class="block text-sm font-medium text-gray-700">Pos Tarif/HS</label>
                        <input type="text" id="pos_tarif_hs" name="pos_tarif_hs" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="pos_tarif_hs-error"></div>
                    </div>
                </div>
                
                <div>
                    <label for="uraian_jenis_barang" class="block text-sm font-medium text-gray-700">Uraian Jenis Barang</label>
                    <textarea id="uraian_jenis_barang" name="uraian_jenis_barang" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
                    <div class="text-red-500 text-xs mt-1 hidden" id="uraian_jenis_barang-error"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="nilai_barang" class="block text-sm font-medium text-gray-700">Nilai Barang</label>
                        <input type="number" step="0.01" id="nilai_barang" name="nilai_barang" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="nilai_barang-error"></div>
                    </div>
                    
                    <div>
                        <label for="jumlah_satuan" class="block text-sm font-medium text-gray-700">Jumlah Satuan</label>
                        <input type="number" step="0.01" id="jumlah_satuan" name="jumlah_satuan" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="jumlah_satuan-error"></div>
                    </div>
                    
                    <div>
                        <label for="jenis_satuan" class="block text-sm font-medium text-gray-700">Jenis Satuan</label>
                        <input type="text" id="jenis_satuan" name="jenis_satuan" placeholder="e.g., PCE - Piece" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <div class="text-red-500 text-xs mt-1 hidden" id="jenis_satuan-error"></div>
                    </div>
                </div>
                
                <div class="flex justify-end gap-3 pt-4 border-t">
                    <button type="button" id="cancel-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                        Batal
                    </button>
                    <button type="submit" id="save-btn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
