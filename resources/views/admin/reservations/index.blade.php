<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-black text-2xl text-amber-900 leading-tight">
            {{ __('Panel Reservasi Admin Ruang Rasa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-amber-50/30 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Alert Messages -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-md shadow-sm">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ms-3">
                            <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-amber-100">
                <div class="p-6 sm:p-8">
                    @if ($reservations->isEmpty())
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-amber-100/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-amber-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-serif font-bold text-amber-950 mb-2">Belum Ada Pengajuan Reservasi</h3>
                            <p class="text-gray-500 text-sm max-w-sm mx-auto">
                                Seluruh riwayat reservasi pelanggan akan muncul di sini setelah mereka melakukan pemesanan meja.
                            </p>
                        </div>
                    @else
                        <!-- Table Listing of Reservations -->
                        <div class="overflow-x-auto rounded-xl border border-amber-100">
                            <table class="min-w-full divide-y divide-amber-100">
                                <thead class="bg-amber-50/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Pelanggan
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Meja
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Tanggal Reservasi
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Jam
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Tamu
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-amber-50">
                                    @foreach ($reservations as $reservation)
                                        <tr class="hover:bg-amber-50/10 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-gray-900">{{ $reservation->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $reservation->user->email }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-amber-950 font-medium">
                                                {{ $reservation->table->table_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $reservation->reservation_date->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ substr($reservation->reservation_time, 0, 5) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $reservation->guest_count }} Orang
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($reservation->status === 'pending')
                                                    <span class="inline-flex items-center rounded-md bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-800 ring-1 ring-inset ring-amber-600/20">
                                                        Pending
                                                    </span>
                                                @elseif ($reservation->status === 'confirmed')
                                                    <span class="inline-flex items-center rounded-md bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                                        Diterima
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-md bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700 ring-1 ring-inset ring-rose-600/20">
                                                        Ditolak
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                @if ($reservation->status === 'pending')
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <!-- Confirm Button -->
                                                        <form action="{{ route('admin.reservations.confirm', $reservation) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-lg shadow-sm transition-colors">
                                                                Terima
                                                            </button>
                                                        </form>
                                                        <!-- Reject Button -->
                                                        <form action="{{ route('admin.reservations.reject', $reservation) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white text-xs font-semibold rounded-lg shadow-sm transition-colors">
                                                                Tolak
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <span class="text-xs text-gray-400 font-normal italic">Ditangani</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
