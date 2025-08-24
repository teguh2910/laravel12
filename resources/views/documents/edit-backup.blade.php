<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BC 2.0 - CEISA 4.0</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .tab-active {
            border-bottom: 2px solid #16a34a;
            color: #16a34a;
        }
        .tab-inactive {
            color: #6b7280;
            hover:color: #374151;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-gray-900">CEISA 4.0</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-500">Hi, Customer Importir</span>
                    <div class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-medium">CI</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Document Header -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-900">BC 2.0</h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200">
                            Kembali
                        </a>
                        <button type="submit" form="bc20-form" class="px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg hover:bg-green-700">
                            Simpan & Kirim
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tab Navigation -->
            <div class="px-6">
                <nav class="flex space-x-8 -mb-px">
                    <button class="tab-link py-4 text-sm font-medium tab-active" data-tab="header">Header</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="entitas">Entitas</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="dokumen">Dokumen</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pengangkut">Pengangkut</button>
                    <button class="tab-link py-4 text-sm font-medium text-red-500 tab-inactive" data-tab="kemasan">Kemasan & Peti Kemas</button>
                    <button class="tab-link py-4 text-sm font-medium text-cyan-500 tab-inactive" data-tab="transaksi">Transaksi</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="barang">Barang</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pungutan">Pungutan</button>
                    <button class="tab-link py-4 text-sm font-medium tab-inactive" data-tab="pernyataan">Pernyataan</button>
                </nav>
            </div>
        </div>

        <!-- Form Content -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <form id="bc20-form" action="{{ route('documents.update', $document) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Header Tab Content -->
                <div id="header-content" class="tab-content p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Pengajuan Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Pengajuan</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Aju</label>
                                <input type="text" name="nomor_aju" value="{{ $document->nomor_aju ?? '000020-010653-20250823-000004' }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       required>
                            </div>
                        </div>

                        <!-- Kantor Pabean Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Kantor Pabean</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pelabuhan Tujuan</label>
                                <select name="pelabuhan_tujuan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-100" required>
                                    <option value="IDTPP - TANJUNG PRIOK" {{ ($document->pelabuhan_tujuan ?? '') == 'IDTPP - TANJUNG PRIOK' ? 'selected' : '' }}>IDTPP - TANJUNG PRIOK</option>
                                    <option value="IDPLB - PALEMBANG">IDPLB - PALEMBANG</option>
                                    <option value="IDMDN - MEDAN">IDMDN - MEDAN</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kantor Pabean</label>
                                <select name="kantor_pabean" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="040300 - KPU BEA DAN CUKAI TIPE A TJ. PRIOK" {{ ($document->kantor_pabean ?? '') == '040300 - KPU BEA DAN CUKAI TIPE A TJ. PRIOK' ? 'selected' : '' }}>040300 - KPU BEA DAN CUKAI TIPE A TJ. PRIOK</option>
                                    <option value="040100 - KPU BEA DAN CUKAI TIPE A JAKARTA">040100 - KPU BEA DAN CUKAI TIPE A JAKARTA</option>
                                </select>
                            </div>
                        </div>

                        <!-- Keterangan Lain Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Keterangan Lain</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis PIB</label>
                                <select name="jenis_pib" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="1 - BIASA" {{ ($document->jenis_pib ?? '') == '1 - BIASA' ? 'selected' : '' }}>1 - BIASA</option>
                                    <option value="2 - BERKALA">2 - BERKALA</option>
                                    <option value="3 - SUSULAN">3 - SUSULAN</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Impor</label>
                                <select name="jenis_impor" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="1 - UNTUK DIPAKAI" {{ ($document->jenis_impor ?? '') == '1 - UNTUK DIPAKAI' ? 'selected' : '' }}>1 - UNTUK DIPAKAI</option>
                                    <option value="2 - UNTUK DITERUSKAN">2 - UNTUK DITERUSKAN</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Cara Pembayaran 
                                    <span class="inline-flex items-center justify-center w-4 h-4 text-xs bg-gray-300 text-gray-600 rounded-full ml-1">?</span>
                                </label>
                                <select name="cara_pembayaran" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    <option value="2 - BERKALA" {{ ($document->cara_pembayaran ?? '') == '2 - BERKALA' ? 'selected' : '' }}>2 - BERKALA</option>
                                    <option value="1 - BIASA">1 - BIASA</option>
                                    <option value="3 - KHUSUS">3 - KHUSUS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Other Tab Contents (Hidden by default) -->
                <div id="entitas-content" class="tab-content p-6 hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Importir Section -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Importir</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NPWP</label>
                                <input type="text" name="importir_npwp" value="001065303055000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NITKU</label>
                                <input type="text" name="importir_nitku" value="001065303055000000000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" name="importir_nama" value="AISIN INDONESIA" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea name="importir_alamat" rows="3" 
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">API/NIB</label>
                                <input type="text" name="importir_api" value="812000069100093" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- NPWP Pemusatan Section -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">NPWP Pemusatan</h3>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Cari Data Importir
                                </button>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NPWP</label>
                                <input type="text" name="pemusatan_npwp" value="001065303055000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NITKU</label>
                                <input type="text" name="pemusatan_nitku" value="001065303055000000000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" name="pemusatan_nama" value="AISIN INDONESIA" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea name="pemusatan_alamat" rows="3" 
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT</textarea>
                            </div>

                            <!-- Pengirim Section within NPWP Pemusatan -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-base font-medium text-gray-900">Pengirim</h4>
                                    <button type="button" class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                        Cari Data Importir
                                    </button>
                                </div>

                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                        <input type="text" name="pengirim_nama" value="sdfjgskmdgf" 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                        <textarea name="pengirim_alamat" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">df g</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Negara</label>
                                        <input type="text" name="pengirim_negara" value="cfsj..." 
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pemilik Barang Section -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-gray-900">Pemilik Barang</h3>
                                <button type="button" class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                    Cari Data
                                </button>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NPWP</label>
                                <input type="text" name="pemilik_npwp" value="001065303055000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NITKU</label>
                                <input type="text" name="pemilik_nitku" value="001065303055000000000" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                <input type="text" name="pemilik_nama" value="AISIN INDONESIA" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea name="pemilik_alamat" rows="3" 
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">KAWASAN INDUSTRI EJIP PLOT 5J 000/000 SUKARESMI, CIKARANG SELATAN, BEKASI, JAWA BARAT</textarea>
                            </div>

                            <!-- Penjual Section within Pemilik Barang -->
                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-base font-medium text-gray-900">Penjual</h4>
                                    <button type="button" class="px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                        Cari Data
                                    </button>
                                </div>

                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                        <input type="text" name="penjual_nama" value="sdf (,"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                        <textarea name="penjual_alamat" rows="3" 
                                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">sdf,</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Negara</label>
                                        <input type="text" name="penjual_negara" value="sdf"
                                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div id="dokumen-content" class="tab-content p-6 hidden">
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
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">KONTRAK</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">df</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2025-08-28</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div class="flex space-x-2">
                                                <button type="button" class="text-blue-600 hover:text-blue-900" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button type="button" class="text-red-600 hover:text-red-900" title="Delete">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <!-- Table Footer -->
                            <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200">
                                <div class="text-sm text-gray-700">
                                    Total 1 items
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <span class="px-3 py-1 text-sm text-gray-700 bg-white border border-gray-300 rounded">1</span>
                                    <button type="button" class="p-2 text-gray-400 hover:text-gray-500" disabled>
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        <input type="text" name="nomor_tutup_pu" class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nomor Pos
                                    </label>
                                    <input type="text" name="nomor_pos" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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
                                        <option value="1 - LAUT" selected>1 - LAUT</option>
                                        <option value="2 - UDARA">2 - UDARA</option>
                                        <option value="3 - DARAT">3 - DARAT</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Sarana Angkut
                                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi nama sarana angkut">?</span>
                                    </label>
                                    <div class="relative">
                                        <input type="text" name="nama_sarana_angkut" value="DIMITRIS Y" class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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
                                        <input type="text" name="nomor_voy" value="253S" class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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
                                        <option value="LR - LIBERIA" selected>LR - LIBERIA</option>
                                        <option value="SG - SINGAPORE">SG - SINGAPORE</option>
                                        <option value="ID - INDONESIA">ID - INDONESIA</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Perkiraan Tanggal Tiba
                                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi perkiraan tanggal tiba">?</span>
                                    </label>
                                    <input type="date" name="tanggal_tiba" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
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
                                        <option value="JPTYO - TOKYO" selected>JPTYO - TOKYO</option>
                                        <option value="SGSIN - SINGAPORE">SGSIN - SINGAPORE</option>
                                        <option value="USNYC - NEW YORK">USNYC - NEW YORK</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Pelabuhan Transit
                                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi pelabuhan transit">?</span>
                                    </label>
                                    <select name="pelabuhan_transit" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Pilih pelabuhan transit</option>
                                        <option value="SGSIN - SINGAPORE" selected>SGSIN - SINGAPORE</option>
                                        <option value="JPTYO - TOKYO">JPTYO - TOKYO</option>
                                        <option value="HKHKG - HONG KONG">HKHKG - HONG KONG</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Pelabuhan Tujuan
                                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi pelabuhan tujuan">?</span>
                                    </label>
                                    <input type="text" name="pelabuhan_tujuan" value="IDTPP - Tanjung Priok" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Tempat Penimbunan
                                        <span class="inline-flex items-center justify-center w-4 h-4 ml-1 bg-gray-400 text-white text-xs rounded-full cursor-help" title="Informasi tempat penimbunan">?</span>
                                    </label>
                                    <select name="tempat_penimbunan" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">Pilih tempat penimbunan</option>
                                        <option value="TPK1 - UTPK I - JICT, PT" selected>TPK1 - UTPK I - JICT, PT</option>
                                        <option value="TPK2 - UTPK II">TPK2 - UTPK II</option>
                                        <option value="TPK3 - UTPK III">TPK3 - UTPK III</option>
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
                        <button type="button" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700" onclick="document.querySelector('[data-tab=\'kemasan\']').click()">
                            Berikutnya
                        </button>
                    </div>
                </div>

                <div id="kemasan-content" class="tab-content p-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Kemasan & Peti Kemas</h3>
                    <p class="text-gray-500">Konten tab Kemasan & Peti Kemas akan ditambahkan di sini...</p>
                </div>

                <div id="transaksi-content" class="tab-content p-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Transaksi</h3>
                    <p class="text-gray-500">Konten tab Transaksi akan ditambahkan di sini...</p>
                </div>

                <div id="barang-content" class="tab-content p-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Barang</h3>
                    <p class="text-gray-500">Konten tab Barang akan ditambahkan di sini...</p>
                </div>

                <div id="pungutan-content" class="tab-content p-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Pungutan</h3>
                    <p class="text-gray-500">Konten tab Pungutan akan ditambahkan di sini...</p>
                </div>

                <div id="pernyataan-content" class="tab-content p-6 hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Pernyataan</h3>
                    <p class="text-gray-500">Konten tab Pernyataan akan ditambahkan di sini...</p>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Sebelumnya
                    </a>
                    <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700">
                        Berikutnya
                    </button>
                </div>
            </form>
        </div>

        <!-- Modal Tambah Dokumen -->
        <div id="modal-tambah-dokumen" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Tambah Dokumen</h3>
                        <button id="close-dokumen-modal" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form id="form-tambah-dokumen">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Dokumen</label>
                            <select name="jenis_dokumen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Jenis Dokumen</option>
                                <option value="KONTRAK">KONTRAK</option>
                                <option value="INVOICE">INVOICE</option>
                                <option value="B/L">B/L</option>
                                <option value="AWB">AWB</option>
                                <option value="PACKING LIST">PACKING LIST</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Dokumen</label>
                            <input type="text" name="nomor_dokumen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Dokumen</label>
                            <input type="date" name="tanggal_dokumen" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="flex justify-end space-x-3">
                            <button type="button" id="batal-dokumen" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Batal
                            </button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Tambah Dokumen
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 text-sm text-gray-500">
                <div>2025 © Host to Host</div>
                <div>Tim Hora</div>
            </div>
        </div>
    </footer>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');
            const tabContents = document.querySelectorAll('.tab-content');

            tabLinks.forEach(link => {
                link.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Remove active class from all tabs
                    tabLinks.forEach(tab => {
                        tab.classList.remove('tab-active');
                        tab.classList.add('tab-inactive');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.remove('tab-inactive');
                    this.classList.add('tab-active');
                    
                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });
                    
                    // Show target tab content
                    const targetContent = document.getElementById(targetTab + '-content');
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                    }
                });
            });

            // Document modal functionality
            const dokumenModal = document.getElementById('modal-tambah-dokumen');
            const tambahBtn = document.getElementById('tambah-dokumen');
            const closeDokumenBtn = document.getElementById('close-dokumen-modal');
            const batalDokumenBtn = document.getElementById('batal-dokumen');
            const formTambahDokumen = document.getElementById('form-tambah-dokumen');

            // Open modal
            if (tambahBtn) {
                tambahBtn.addEventListener('click', () => {
                    dokumenModal.classList.remove('hidden');
                });
            }

            // Close modal functions
            function closeDokumenModal() {
                dokumenModal.classList.add('hidden');
                formTambahDokumen.reset();
            }

            if (closeDokumenBtn) {
                closeDokumenBtn.addEventListener('click', closeDokumenModal);
            }

            if (batalDokumenBtn) {
                batalDokumenBtn.addEventListener('click', closeDokumenModal);
            }

            // Close modal when clicking outside
            dokumenModal.addEventListener('click', (e) => {
                if (e.target === dokumenModal) {
                    closeDokumenModal();
                }
            });

            // Handle form submission
            formTambahDokumen.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const jenisDokumen = formData.get('jenis_dokumen');
                const nomorDokumen = formData.get('nomor_dokumen');
                const tanggalDokumen = formData.get('tanggal_dokumen');

                // Get current table body
                const tbody = document.querySelector('#dokumen-content tbody');
                const currentRows = tbody.querySelectorAll('tr').length;
                const newSeri = currentRows + 1;

                // Create new row
                const newRow = `
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${newSeri}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${jenisDokumen}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${nomorDokumen}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">${tanggalDokumen}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex space-x-2">
                                <button type="button" class="text-blue-600 hover:text-blue-900" title="Edit">
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
                `;

                // Add new row to table
                tbody.insertAdjacentHTML('beforeend', newRow);

                // Update total count
                const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                if (totalElement) {
                    const newTotal = tbody.querySelectorAll('tr').length;
                    totalElement.textContent = `Total ${newTotal} items`;
                }

                // Close modal
                closeDokumenModal();

                // Add event listener to new delete button
                const newDeleteBtn = tbody.lastElementChild.querySelector('.delete-doc-btn');
                if (newDeleteBtn) {
                    newDeleteBtn.addEventListener('click', function() {
                        if (confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                            this.closest('tr').remove();
                            // Update serial numbers and total count
                            updateSerialNumbers();
                        }
                    });
                }
            });

            // Function to update serial numbers after deletion
            function updateSerialNumbers() {
                const tbody = document.querySelector('#dokumen-content tbody');
                const rows = tbody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    const seriCell = row.querySelector('td:first-child');
                    seriCell.textContent = index + 1;
                });

                // Update total count
                const totalElement = document.querySelector('#dokumen-content .text-sm.text-gray-700');
                if (totalElement) {
                    totalElement.textContent = `Total ${rows.length} items`;
                }
            }

            // Add event listeners to existing delete buttons
            document.querySelectorAll('.delete-doc-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin menghapus dokumen ini?')) {
                        this.closest('tr').remove();
                        updateSerialNumbers();
                    }
                });
            });

            // Close modal with Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !dokumenModal.classList.contains('hidden')) {
                    closeDokumenModal();
                }
            });
        });
    </script>
</body>
</html>
