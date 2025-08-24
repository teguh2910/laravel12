<div id="dokumen-content" class="tab-content p-6 hidden">
    <!-- Dokumen Tab Content -->
    <div class="space-y-6">        
        <!-- Add Document Button -->
        <div>
            <button type="button" id="tambah-dokumen" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600">
                Tambah
            </button>
        </div>

        <br>

        <!-- Documents Table -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Seri</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $rawData = $document->dokumen_lampiran;
                        $documents = $document->dokumen_lampiran ?? [];
                        
                        // Debug information
                        echo "<!-- Debug: Raw data type: " . gettype($rawData) . " -->";
                        echo "<!-- Debug: Raw data: " . json_encode($rawData) . " -->";
                        
                        // Ensure $documents is always an array
                        if (!is_array($documents)) {
                            if (is_string($documents)) {
                                $documents = json_decode($documents, true) ?? [];
                                echo "<!-- Debug: Decoded from string -->";
                            } else {
                                $documents = [];
                                echo "<!-- Debug: Fallback to empty array -->";
                            }
                        }
                        $hasDocuments = count($documents) > 0;
                        echo "<!-- Debug: Final documents count: " . count($documents) . " -->";
                    @endphp
                    
                    @if($hasDocuments)
                        @foreach($documents as $index => $doc)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $doc['jenis'] ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $doc['nomor'] ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $doc['tanggal'] ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-2">
                                    <button type="button" class="text-blue-600 hover:text-blue-900 edit-doc-btn" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="text-red-600 hover:text-red-900 delete-doc-btn" title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr class="hover:bg-gray-50">
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Belum ada dokumen. Klik tombol "Tambah" untuk menambah dokumen.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            
            <!-- Table Footer -->
            <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                <div class="text-sm text-gray-700">
                    Total {{ is_array($documents) ? count($documents) : 0 }} items
                </div>
                <div class="flex items-center space-x-2">
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <span class="px-3 py-2 text-sm text-gray-500">1</span>
                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400" onclick="document.querySelector('[data-tab=\'entitas\']').click()">
            Sebelumnya
        </button>
        <button type="button" id="save-dokumen-next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-50" onclick="saveDokumenAndNext()">
            <span id="btn-dokumen-text">Berikutnya</span>
            <span id="btn-dokumen-loading" class="hidden">
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            </span>
        </button>
    </div>
</div>
