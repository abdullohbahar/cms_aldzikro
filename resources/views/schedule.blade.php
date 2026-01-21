@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <div class="pt-35 pb-35 md:pt-60 md:pb-20">
            <h1 class="uppercase text-white font-secondary font-black text-4xl text-center md:text-start lg:text-5xl">Jadwal Harian Santri</h1>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="section-title">Jadwal Kegiatan Harian</h2>
            <p class="section-description">Kegiatan santri di Yayasan Al-Dzikro</p>
        </div>
        
        @if($schedules->count() > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Hari</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Waktu</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @php $currentDay = ''; @endphp
                        @foreach($schedules as $schedule)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                @if($currentDay != $schedule->day)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold {{ $schedule->day == 'Minggu' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                                        {{ $schedule->day }}
                                    </span>
                                    @php $currentDay = $schedule->day; @endphp
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center text-secondary">
                                    <i class="fas fa-clock mr-2 text-primary"></i>
                                    <span class="font-mono">{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-secondary">
                                {{ $schedule->activity }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-500">Belum ada jadwal kegiatan</p>
        </div>
        @endif
    </div>
</section>
@endsection
