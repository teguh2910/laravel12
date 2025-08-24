<div id="pungutan-content" class="tab-content p-6 hidden">
    <h3 class="text-lg font-medium text-gray-900 mb-6">Pungutan</h3>
    
    <!-- Pungutan Table -->
    <div class="overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        Keterangan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        Dibayar (Rp.)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        Ditanggung Pemerintah (Rp.)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        Ditunda (Rp.)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        Tidak DiPungut (Rp.)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider border-r border-gray-200">
                        DiBebaskan (Rp.)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telah DiLunasi (Rp.)
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- BM Row -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-200">
                        BM
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bm_dibayar" value="{{ old('bm_dibayar', $document->bm_dibayar ?? '1352000') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bm_ditanggung_pemerintah" value="{{ old('bm_ditanggung_pemerintah', $document->bm_ditanggung_pemerintah ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bm_ditunda" value="{{ old('bm_ditunda', $document->bm_ditunda ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bm_tidak_dipungut" value="{{ old('bm_tidak_dipungut', $document->bm_tidak_dipungut ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bm_dibebaskan" value="{{ old('bm_dibebaskan', $document->bm_dibebaskan ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input type="number" name="bm_telah_dilunasi" value="{{ old('bm_telah_dilunasi', $document->bm_telah_dilunasi ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                </tr>

                <!-- BMT Row -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-200">
                        BMT
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bmt_dibayar" value="{{ old('bmt_dibayar', $document->bmt_dibayar ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bmt_ditanggung_pemerintah" value="{{ old('bmt_ditanggung_pemerintah', $document->bmt_ditanggung_pemerintah ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bmt_ditunda" value="{{ old('bmt_ditunda', $document->bmt_ditunda ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bmt_tidak_dipungut" value="{{ old('bmt_tidak_dipungut', $document->bmt_tidak_dipungut ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="bmt_dibebaskan" value="{{ old('bmt_dibebaskan', $document->bmt_dibebaskan ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input type="number" name="bmt_telah_dilunasi" value="{{ old('bmt_telah_dilunasi', $document->bmt_telah_dilunasi ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                </tr>

                <!-- CUKAI Row -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-200">
                        CUKAI
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="cukai_dibayar" value="{{ old('cukai_dibayar', $document->cukai_dibayar ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="cukai_ditanggung_pemerintah" value="{{ old('cukai_ditanggung_pemerintah', $document->cukai_ditanggung_pemerintah ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="cukai_ditunda" value="{{ old('cukai_ditunda', $document->cukai_ditunda ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="cukai_tidak_dipungut" value="{{ old('cukai_tidak_dipungut', $document->cukai_tidak_dipungut ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="cukai_dibebaskan" value="{{ old('cukai_dibebaskan', $document->cukai_dibebaskan ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input type="number" name="cukai_telah_dilunasi" value="{{ old('cukai_telah_dilunasi', $document->cukai_telah_dilunasi ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                </tr>

                <!-- PPH Row -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-200">
                        PPH
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="pph_dibayar" value="{{ old('pph_dibayar', $document->pph_dibayar ?? '232000') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="pph_ditanggung_pemerintah" value="{{ old('pph_ditanggung_pemerintah', $document->pph_ditanggung_pemerintah ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="pph_ditunda" value="{{ old('pph_ditunda', $document->pph_ditunda ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="pph_tidak_dipungut" value="{{ old('pph_tidak_dipungut', $document->pph_tidak_dipungut ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="pph_dibebaskan" value="{{ old('pph_dibebaskan', $document->pph_dibebaskan ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input type="number" name="pph_telah_dilunasi" value="{{ old('pph_telah_dilunasi', $document->pph_telah_dilunasi ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                </tr>

                <!-- PPN Row -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r border-gray-200">
                        PPN
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="ppn_dibayar" value="{{ old('ppn_dibayar', $document->ppn_dibayar ?? '4640000') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="ppn_ditanggung_pemerintah" value="{{ old('ppn_ditanggung_pemerintah', $document->ppn_ditanggung_pemerintah ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="ppn_ditunda" value="{{ old('ppn_ditunda', $document->ppn_ditunda ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="ppn_tidak_dipungut" value="{{ old('ppn_tidak_dipungut', $document->ppn_tidak_dipungut ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center border-r border-gray-200">
                        <input type="number" name="ppn_dibebaskan" value="{{ old('ppn_dibebaskan', $document->ppn_dibebaskan ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input type="number" name="ppn_telah_dilunasi" value="{{ old('ppn_telah_dilunasi', $document->ppn_telah_dilunasi ?? '0') }}" 
                               class="w-full border-0 text-center focus:ring-2 focus:ring-blue-500 focus:border-blue-500" readonly>
                    </td>
                </tr>

                <!-- Total Row -->
                <tr class="bg-gray-100 font-semibold border-t-2 border-gray-300">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900 border-r border-gray-200">
                        Total
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold border-r border-gray-200" id="total-dibayar">
                        6,224,000
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold border-r border-gray-200" id="total-ditanggung">
                        0
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold border-r border-gray-200" id="total-ditunda">
                        0
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold border-r border-gray-200" id="total-tidak-dipungut">
                        0
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold border-r border-gray-200" id="total-dibebaskan">
                        0
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center font-bold" id="total-telah-dilunasi">
                        0
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
        <div class="flex space-x-3">
            
            <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" onclick="calculateTotals()">
                Hitung Ulang
            </button>
        </div>
        
        <div class="flex space-x-3">
            <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'barang\']').click()">
                Sebelumnya
            </button>
            <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="document.querySelector('[data-tab=\'pernyataan\']').click()">
                Berikutnya
            </button>
        </div>
    </div>
</div>

<script>
// Toggle edit mode for pungutan table
function toggleEditMode() {
    const inputs = document.querySelectorAll('#pungutan-content input[type="number"]');
    const editBtn = document.getElementById('edit-btn-text');
    
    if (!inputs.length || !editBtn) {
        return; // Exit if elements don't exist
    }
    
    const isReadonly = inputs[0].hasAttribute('readonly');
    
    inputs.forEach(input => {
        if (isReadonly) {
            input.removeAttribute('readonly');
            input.classList.remove('border-0');
            input.classList.add('border', 'border-gray-300');
        } else {
            input.setAttribute('readonly', true);
            input.classList.add('border-0');
            input.classList.remove('border', 'border-gray-300');
        }
    });
    
    editBtn.textContent = isReadonly ? 'Simpan' : 'Edit';
    
    if (!isReadonly) {
        calculateTotals();
    }
}

// Calculate totals for pungutan
function calculateTotals() {
    // Check if we're in the pungutan tab and required elements exist
    const pungutanContent = document.getElementById('pungutan-content');
    if (!pungutanContent || pungutanContent.classList.contains('hidden')) {
        return; // Exit if pungutan tab is not active
    }
    
    // Check if required elements exist
    const totalDibayarElement = document.getElementById('total-dibayar');
    const summaryDibayarElement = document.getElementById('summary-dibayar');
    if (!totalDibayarElement || !summaryDibayarElement) {
        return; // Exit if required elements don't exist
    }
    
    const categories = ['dibayar', 'ditanggung_pemerintah', 'ditunda', 'tidak_dipungut', 'dibebaskan', 'telah_dilunasi'];
    const taxes = ['bm', 'bmt', 'cukai', 'pph', 'ppn'];
    
    categories.forEach(category => {
        let total = 0;
        taxes.forEach(tax => {
            const inputElement = document.querySelector(`input[name="${tax}_${category}"]`);
            const value = inputElement ? parseFloat(inputElement.value) || 0 : 0;
            total += value;
        });
        
        const totalElement = document.getElementById(`total-${category.replace('_', '-')}`);
        if (totalElement) {
            totalElement.textContent = new Intl.NumberFormat('id-ID').format(total);
        }
    });
    
    // Update summary
    const totalDibayar = parseFloat(totalDibayarElement.textContent.replace(/[^\d]/g, '')) || 0;
    const totalFasilitas = ['ditanggung_pemerintah', 'ditunda', 'tidak_dipungut', 'dibebaskan'].reduce((sum, category) => {
        const totalElement = document.getElementById(`total-${category.replace('_', '-')}`);
        const value = totalElement ? parseFloat(totalElement.textContent.replace(/[^\d]/g, '')) || 0 : 0;
        return sum + value;
    }, 0);
    
    const summaryFasilitasElement = document.getElementById('summary-fasilitas');
    const summaryGrandTotalElement = document.getElementById('summary-grand-total');
    
    if (summaryDibayarElement) {
        summaryDibayarElement.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(totalDibayar)}`;
    }
    if (summaryFasilitasElement) {
        summaryFasilitasElement.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(totalFasilitas)}`;
    }
    if (summaryGrandTotalElement) {
        summaryGrandTotalElement.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(totalDibayar + totalFasilitas)}`;
    }
}

// Initialize calculations on load
document.addEventListener('DOMContentLoaded', function() {
    // Only calculate totals if pungutan tab is initially active or when it becomes active
    const pungutanContent = document.getElementById('pungutan-content');
    if (pungutanContent && !pungutanContent.classList.contains('hidden')) {
        calculateTotals();
    }
    
    // Add event listener for when pungutan tab becomes active
    const pungutanTab = document.querySelector('[data-tab="pungutan"]');
    if (pungutanTab) {
        pungutanTab.addEventListener('click', function() {
            // Use setTimeout to ensure the tab content is visible before calculating
            setTimeout(() => {
                calculateTotals();
            }, 10);
        });
    }
});
</script>
