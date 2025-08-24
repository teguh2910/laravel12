<!-- Reference Data Modal -->
<div id="referenceDataModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Pilih Data Referensi</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600" id="closeModalBtn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Search and Filter -->
            <div class="mt-4 mb-4">
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" id="searchInput" placeholder="Cari nama atau alamat..." 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="sm:w-48">
                        <select id="countryFilter" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua Negara</option>
                            <option value="jp">Japan</option>
                            <option value="sg">Singapore</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Loading State -->
            <div id="loadingState" class="text-center py-8 hidden">
                <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <p class="mt-2 text-gray-600">Memuat data...</p>
            </div>

            <!-- Data List -->
            <div id="dataList" class="max-h-96 overflow-y-auto">
                <!-- Data will be populated here -->
            </div>

            <!-- No Data State -->
            <div id="noDataState" class="text-center py-8 hidden">
                <p class="text-gray-500">Tidak ada data yang ditemukan</p>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end mt-6 pt-4 border-t border-gray-200">
                <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 mr-2">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<script>
class ReferenceDataModal {
    constructor() {
        this.modal = document.getElementById('referenceDataModal');
        this.modalTitle = document.getElementById('modalTitle');
        this.searchInput = document.getElementById('searchInput');
        this.countryFilter = document.getElementById('countryFilter');
        this.loadingState = document.getElementById('loadingState');
        this.dataList = document.getElementById('dataList');
        this.noDataState = document.getElementById('noDataState');
        this.closeModalBtn = document.getElementById('closeModalBtn');
        this.cancelBtn = document.getElementById('cancelBtn');
        
        this.currentType = '';
        this.currentCallback = null;
        this.searchTimeout = null;
        
        this.initEventListeners();
    }

    initEventListeners() {
        // Close modal events
        this.closeModalBtn.addEventListener('click', () => this.close());
        this.cancelBtn.addEventListener('click', () => this.close());
        
        // Click outside to close
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.close();
            }
        });

        // Search input
        this.searchInput.addEventListener('input', () => {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => this.loadData(), 300);
        });

        // Country filter
        this.countryFilter.addEventListener('change', () => this.loadData());

        // ESC key to close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !this.modal.classList.contains('hidden')) {
                this.close();
            }
        });
    }

    open(type, callback) {
        this.currentType = type;
        this.currentCallback = callback;
        
        // Set modal title
        if (type === 'pengirim') {
            this.modalTitle.textContent = 'Pilih Pengirim Barang';
        } else if (type === 'penjual') {
            this.modalTitle.textContent = 'Pilih Penjual Barang';
        }

        // Reset inputs
        this.searchInput.value = '';
        this.countryFilter.value = '';
        
        // Show modal
        this.modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        
        // Load data
        this.loadData();
        
        // Focus search input
        setTimeout(() => this.searchInput.focus(), 100);
    }

    close() {
        this.modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        this.currentType = '';
        this.currentCallback = null;
    }

    async loadData() {
        const search = this.searchInput.value.trim();
        const negara = this.countryFilter.value;

        // Show loading
        this.showLoading();

        try {
            let url = '';
            if (this.currentType === 'pengirim') {
                url = '/api/pengirim-barang';
            } else if (this.currentType === 'penjual') {
                url = '/api/penjual-barang';
            }

            const params = new URLSearchParams();
            if (search) params.append('search', search);
            if (negara) params.append('negara', negara);

            if (params.toString()) {
                url += '?' + params.toString();
            }

            const response = await fetch(url);
            const result = await response.json();

            if (result.success) {
                this.renderData(result.data);
            } else {
                throw new Error('Failed to load data');
            }
        } catch (error) {
            console.error('Error loading data:', error);
            this.showNoData();
        }
    }

    showLoading() {
        this.loadingState.classList.remove('hidden');
        this.dataList.classList.add('hidden');
        this.noDataState.classList.add('hidden');
    }

    showNoData() {
        this.loadingState.classList.add('hidden');
        this.dataList.classList.add('hidden');
        this.noDataState.classList.remove('hidden');
    }

    renderData(data) {
        this.loadingState.classList.add('hidden');
        this.noDataState.classList.add('hidden');
        this.dataList.classList.remove('hidden');

        if (data.length === 0) {
            this.showNoData();
            return;
        }

        this.dataList.innerHTML = data.map(item => `
            <div class="border border-gray-200 rounded-lg p-4 mb-3 hover:bg-gray-50 cursor-pointer data-item" 
                 data-id="${item.id}" 
                 data-nama="${item.nama}" 
                 data-alamat="${item.alamat}" 
                 data-negara="${item.negara}">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">${item.nama}</h4>
                        <p class="text-xs text-gray-600 mt-1">${item.alamat}</p>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mt-2">
                            ${item.negara === 'jp' ? 'Japan' : item.negara === 'sg' ? 'Singapore' : item.negara}
                        </span>
                    </div>
                    <button type="button" class="ml-4 px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 select-btn">
                        Pilih
                    </button>
                </div>
            </div>
        `).join('');

        // Add click event listeners
        this.dataList.querySelectorAll('.data-item').forEach(item => {
            item.addEventListener('click', () => {
                const data = {
                    id: item.dataset.id,
                    nama: item.dataset.nama,
                    alamat: item.dataset.alamat,
                    negara: item.dataset.negara
                };
                this.selectItem(data);
            });
        });
    }

    selectItem(data) {
        if (this.currentCallback) {
            this.currentCallback(data);
        }
        this.close();
    }
}

// Initialize modal when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.referenceDataModal = new ReferenceDataModal();
});
</script>
