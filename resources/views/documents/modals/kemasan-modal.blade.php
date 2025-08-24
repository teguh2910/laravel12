<!-- Kemasan Modal -->
<div id="kemasan-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" style="display: none; align-items: center; justify-content: center;">
    <div class="bg-white rounded-lg shadow-lg w-80 max-w-sm mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="kemasan-modal-title" class="text-lg font-medium text-gray-900">Tambah Kemasan</h3>
                <button type="button" id="close-kemasan-modal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <form id="kemasan-form" class="px-6 py-4">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                    <input type="number" id="kemasan-jumlah" name="jumlah" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis</label>
                    <select id="kemasan-jenis" name="jenis" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis</option>
                        <option value="PX - PALLET">PX - PALLET</option>
                        <option value="CT - CARTON">CT - CARTON</option>
                        <option value="BG - BAG">BG - BAG</option>
                        <option value="DR - DRUM">DR - DRUM</option>
                        <option value="BL - BALE">BL - BALE</option>
                        <option value="RO - ROLL">RO - ROLL</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Merek</label>
                    <input type="text" id="kemasan-merek" name="merek" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <input type="hidden" id="kemasan-index" name="index" value="">
            </div>
            
            <div class="flex justify-end space-x-3 mt-6 pt-4 border-t border-gray-200">
                <button type="button" id="cancel-kemasan" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit" id="save-kemasan" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
