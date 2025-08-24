<!-- Peti Kemas Modal -->
<div id="petikemas-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50" style="display: none; align-items: center; justify-content: center;">
    <div class="bg-white rounded-lg shadow-lg w-80 max-w-sm mx-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 id="petikemas-modal-title" class="text-lg font-medium text-gray-900">Tambah Peti Kemas</h3>
                <button type="button" id="close-petikemas-modal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <form id="petikemas-form" class="px-6 py-4">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Seri</label>
                    <input type="text" id="petikemas-seri" name="seri" required readonly class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor</label>
                    <input type="text" id="petikemas-nomor" name="nomor" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ukuran</label>
                    <select id="petikemas-ukuran" name="ukuran" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Ukuran</option>
                        <option value="20'">20'</option>
                        <option value="40'">40'</option>
                        <option value="40'HC">40'HC</option>
                        <option value="45'">45'</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Muatan</label>
                    <select id="petikemas-jenis-muatan" name="jenis_muatan" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Jenis Muatan</option>
                        <option value="FCL">FCL (Full Container Load)</option>
                        <option value="LCL">LCL (Less Container Load)</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipe</label>
                    <select id="petikemas-tipe" name="tipe" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Tipe</option>
                        <option value="DC">DC (Dry Container)</option>
                        <option value="RF">RF (Reefer Container)</option>
                        <option value="TK">TK (Tank Container)</option>
                        <option value="FR">FR (Flat Rack)</option>
                        <option value="OT">OT (Open Top)</option>
                    </select>
                </div>
                
                <input type="hidden" id="petikemas-index" name="index" value="">
            </div>
            
            <div class="flex justify-end space-x-3 mt-6 pt-4 border-t border-gray-200">
                <button type="button" id="cancel-petikemas" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Batal
                </button>
                <button type="submit" id="save-petikemas" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
