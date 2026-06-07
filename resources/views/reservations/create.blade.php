<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif font-black text-2xl text-amber-900 leading-tight">
            {{ __('Form Reservasi Meja') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-amber-50/30 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Back link -->
            <div class="mb-6">
                <a href="{{ route('tables.index') }}" class="inline-flex items-center text-sm font-medium text-amber-800 hover:text-amber-950 transition-colors">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Meja
                </a>
            </div>

            <!-- Main card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-amber-100">
                <div class="p-6 sm:p-8">
                    <!-- Highlighted selected table info -->
                    <div class="mb-8 p-6 bg-amber-50/40 rounded-2xl border border-amber-100/80 flex items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold text-amber-800 uppercase tracking-wider block mb-1">Meja Pilihan Anda</span>
                            <h3 class="text-2xl font-serif font-bold text-amber-950">{{ $table->table_number }}</h3>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center rounded-full bg-amber-100 px-3 py-1 text-sm font-medium text-amber-900">
                                Kapasitas Maksimal: {{ $table->capacity }} Orang
                            </span>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="table_id" value="{{ $table->id }}">

                        <div class="space-y-6">
                            <!-- Date Input -->
                            <div>
                                <label for="reservation_date" class="block text-sm font-medium text-gray-700 mb-1">
                                    Tanggal Reservasi
                                </label>
                                <div class="relative">
                                    <input type="date" name="reservation_date" id="reservation_date" 
                                           value="{{ old('reservation_date', date('Y-m-d')) }}"
                                           min="{{ date('Y-m-d') }}"
                                           class="block w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition duration-150 shadow-sm"
                                           required>
                                </div>
                                @error('reservation_date')
                                    <p class="text-sm text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Time Input -->
                            <div>
                                <label for="reservation_time" class="block text-sm font-medium text-gray-700 mb-1">
                                    Jam Reservasi
                                </label>
                                <input type="time" name="reservation_time" id="reservation_time"
                                       value="{{ old('reservation_time', '19:00') }}"
                                       class="block w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition duration-150 shadow-sm"
                                       required>
                                <p class="text-xs text-gray-400 mt-1">Kami buka dari pukul 11:00 hingga 22:00.</p>
                                @error('reservation_time')
                                    <p class="text-sm text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Guest Count Input -->
                            <div>
                                <label for="guest_count" class="block text-sm font-medium text-gray-700 mb-1">
                                    Jumlah Orang (Tamu)
                                </label>
                                <input type="number" name="guest_count" id="guest_count"
                                       value="{{ old('guest_count', 1) }}"
                                       min="1"
                                       max="{{ $table->capacity }}"
                                       class="block w-full rounded-xl border-amber-200 focus:border-amber-500 focus:ring focus:ring-amber-200 focus:ring-opacity-50 transition duration-150 shadow-sm"
                                       required>
                                <p class="text-xs text-gray-400 mt-1">Jumlah tamu tidak boleh melebihi kapasitas meja ini (maks. {{ $table->capacity }} orang).</p>
                                @error('guest_count')
                                    <p class="text-sm text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Warning / Policy Alert -->
                            <div class="p-4 bg-amber-50 rounded-xl border border-amber-200/50 flex items-start space-x-3 text-xs text-amber-900/80">
                                <svg class="w-5 h-5 text-amber-700 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="leading-relaxed">
                                    <strong>Kebijakan Reservasi:</strong> Harap datang tepat waktu sesuai jam reservasi Anda. Keterlambatan lebih dari 15 menit tanpa pemberitahuan dapat mengakibatkan pembatalan otomatis oleh pihak restoran.
                                </p>
                            </div>

                            <!-- Submit button -->
                            <div class="pt-4">
                                <button type="submit" class="w-full py-3 bg-amber-800 hover:bg-amber-900 text-white font-semibold text-base rounded-xl shadow-md transition-all duration-200 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                                    Konfirmasi & Ajukan Reservasi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
