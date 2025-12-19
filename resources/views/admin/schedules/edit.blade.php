@extends('layouts.admin')

@section('title', 'Edit Jadwal')
@section('header', 'Edit Jadwal Harian')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.schedules.update', $schedule) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="day" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-calendar text-gray-500 mr-1"></i> Hari
                </label>
                <select name="day" id="day" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                    <option value="">Pilih Hari</option>
                    @foreach(\App\Models\Schedule::$days as $day)
                        <option value="{{ $day }}" {{ old('day', $schedule->day) == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
                @error('day')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="time" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-clock text-gray-500 mr-1"></i> Jam
                </label>
                <input type="time" name="time" id="time" value="{{ old('time', substr($schedule->time, 0, 5)) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                @error('time')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="activity" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-clipboard-list text-gray-500 mr-1"></i> Kegiatan
                </label>
                <input type="text" name="activity" id="activity" value="{{ old('activity', $schedule->activity) }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                @error('activity')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.schedules.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
