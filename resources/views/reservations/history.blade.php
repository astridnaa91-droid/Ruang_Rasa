<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-black text-2xl text-amber-900 leading-tight">
            {{ __('Riwayat Reservasi Anda') }}
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
                        <!-- Empty State -->
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-amber-100/50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-amber-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-serif font-bold text-amber-950 mb-2">Belum Ada Reservasi</h3>
                            <p class="text-gray-500 text-sm max-w-sm mx-auto mb-6">
                                Anda belum mengajukan reservasi meja. Silakan kunjungi daftar meja kami untuk memesan tempat makan Anda.
                            </p>
                            <a href="{{ route('tables.index') }}" class="inline-flex items-center px-5 py-2.5 bg-amber-800 hover:bg-amber-900 text-white font-medium text-sm rounded-xl shadow transition-colors">
                                Pilih Meja Sekarang
                            </a>
                        </div>
                    @else
                        <!-- Table Listing of Reservations -->
                        <div class="overflow-x-auto rounded-xl border border-amber-100">
                            <table class="min-w-full divide-y divide-amber-100">
                                <thead class="bg-amber-50/50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Tanggal Reservasi
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Meja
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Jam
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Jumlah Orang
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Diajukan Pada
                                        </th>
                                        <th scope="col" class="px-6 py-4 class-left text-xs font-semibold text-amber-900 uppercase tracking-wider">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-amber-50">
                                    @foreach ($reservations as $reservation)
                                        <tr class="hover:bg-amber-50/10 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                {{ $reservation->reservation_date->format('d M Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-amber-950 font-medium">
                                                {{ $reservation->table->table_number }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ substr($reservation->reservation_time, 0, 5) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                                {{ $reservation->guest_count }} Orang
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-400">
                                                {{ $reservation->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($reservation->status === 'pending')
                                                    <span class="inline-flex items-center rounded-md bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-800 ring-1 ring-inset ring-amber-600/20">
                                                        Menunggu konfirmasi admin
                                                    </span>
                                                @elseif ($reservation->status === 'confirmed')
                                                    <span class="inline-flex items-center rounded-md bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                                        Dikonfirmasi
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-md bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700 ring-1 ring-inset ring-rose-600/20">
                                                        Ditolak
                                                    </span>
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
