<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-black text-2xl text-amber-900 leading-tight">
            {{ __('Daftar Meja Ruang Rasa') }}
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

            @if (session('error'))
                <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-md shadow-sm">
                    <div class="flex">
                        <div class="shrink-0">
                            <svg class="h-5 w-5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ms-3">
                            <p class="text-sm font-medium text-rose-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-amber-100">
                <div class="p-6 sm:p-8 bg-white">
                    <!-- Banner Info -->
                    <div class="mb-8 p-6 bg-gradient-to-r from-amber-800 to-amber-950 rounded-2xl text-amber-50 shadow-md">
                        <h3 class="text-xl font-serif font-bold mb-2">Selamat Datang di Ruang Rasa</h3>
                        <p class="text-amber-200/90 text-sm max-w-2xl leading-relaxed">
                            Nikmati suasana kuliner eksklusif dengan cita rasa khas nusantara. Silakan pilih meja terbaik yang sesuai dengan kebutuhan jumlah tamu Anda di bawah ini untuk memulai reservasi.
                        </p>
                    </div>

                    <!-- Grid of Tables -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($tables as $table)
                            <div class="group relative bg-white border border-amber-100 rounded-2xl p-6 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 {{ $table->status === 'booked' ? 'opacity-75 bg-gray-50/50' : 'hover:border-amber-300' }}">
                                <!-- Table Header info -->
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="font-serif font-black text-xl text-amber-950 tracking-tight group-hover:text-amber-800 transition-colors">
                                            {{ $table->table_number }}
                                        </h4>
                                        <div class="flex items-center text-xs text-gray-500 mt-1">
                                            <svg class="w-4 h-4 mr-1 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Kapasitas: {{ $table->capacity }} Orang
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    @if ($table->status === 'available')
                                        <span class="inline-flex items-center rounded-md bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-md bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700 ring-1 ring-inset ring-rose-600/20">
                                            Penuh
                                        </span>
                                    @endif
                                </div>

                                <!-- Dining Table visual representation -->
                                <div class="my-6 flex justify-center items-center py-4 bg-amber-50/20 rounded-xl border border-dashed border-amber-200/50">
                                    <div class="relative w-16 h-16 rounded-full bg-amber-700/10 border-2 border-amber-800/20 flex items-center justify-center">
                                        <span class="text-xs font-serif font-bold text-amber-900">{{ $table->capacity }}P</span>
                                        <!-- Chairs indicators -->
                                        @for ($i = 0; $i < min($table->capacity, 4); $i++)
                                            <span class="absolute w-3 h-3 rounded-full bg-amber-800/40 border border-amber-900/10" style="
                                                transform: rotate({{ $i * (360 / min($table->capacity, 4)) }}deg) translateY(-1.7rem);
                                            "></span>
                                        @endfor
                                    </div>
                                </div>

                                <!-- Action Button -->
                                @if ($table->status === 'available')
                                    <a href="{{ route('reservations.create', $table) }}" class="block w-full text-center px-4 py-2.5 bg-amber-800 hover:bg-amber-900 text-white font-medium text-sm rounded-xl shadow-sm transition-all duration-250 hover:shadow">
                                        Pilih Meja
                                    </a>
                                @else
                                    <button disabled class="w-full px-4 py-2.5 bg-gray-100 text-gray-400 font-medium text-sm rounded-xl cursor-not-allowed">
                                        Sudah Dipesan
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
