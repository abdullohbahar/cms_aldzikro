@extends('layouts.admin')

@section('title', 'Edit Rekening')
@section('header', 'Edit Data Rekening')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.bank-accounts.update', $bankAccount) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="bank_name" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-university text-gray-500 mr-1"></i> Nama Bank
                </label>
                <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $bankAccount->bank_name) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                @error('bank_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="account_holder" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user text-gray-500 mr-1"></i> Nama Pemilik Rekening
                </label>
                <input type="text" name="account_holder" id="account_holder" value="{{ old('account_holder', $bankAccount->account_holder) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                @error('account_holder')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="account_number" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-credit-card text-gray-500 mr-1"></i> Nomor Rekening
                </label>
                <input type="text" name="account_number" id="account_number" value="{{ old('account_number', $bankAccount->account_number) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono" 
                    required>
                @error('account_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.bank-accounts.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
