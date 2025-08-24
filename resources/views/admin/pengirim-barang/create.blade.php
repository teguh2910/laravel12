@extends('admin.layout')

@section('title', 'Tambah Pengirim Barang')
@section('header', 'Tambah Pengirim Barang')

@section('content')
<div class="px-4 sm:px-0">
    <div class="max-w-2xl">
        <form action="{{ route('admin.pengirim-barang.store') }}" method="POST" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            @csrf
            
            <div class="px-4 py-6 sm:p-8">
                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8">
                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama Pengirim</label>
                        <div class="mt-2">
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 @error('nama') ring-red-300 @enderror"
                                   required>
                        </div>
                        @error('nama')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                        <div class="mt-2">
                            <textarea name="alamat" id="alamat" rows="3" 
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 @error('alamat') ring-red-300 @enderror"
                                      required>{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Negara -->
                    <div>
                        <label for="negara" class="block text-sm font-medium leading-6 text-gray-900">Negara</label>
                        <div class="mt-2">
                            <select name="negara" id="negara" 
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6 @error('negara') ring-red-300 @enderror"
                                    required>
                                <option value="">Pilih Negara</option>
                                <option value="jp" {{ old('negara') === 'jp' ? 'selected' : '' }}>Japan</option>
                                <option value="sg" {{ old('negara') === 'sg' ? 'selected' : '' }}>Singapore</option>
                            </select>
                        </div>
                        @error('negara')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Aktif -->
                    <div>
                        <div class="flex items-center">
                            <input id="is_active" name="is_active" type="checkbox" 
                                   class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label for="is_active" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Status Aktif</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                <a href="{{ route('admin.pengirim-barang.index') }}" class="text-sm font-semibold leading-6 text-gray-900">
                    Batal
                </a>
                <button type="submit" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
