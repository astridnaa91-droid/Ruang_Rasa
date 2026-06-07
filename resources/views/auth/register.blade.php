<x-guest-layout>
    <x-slot name="title">Daftar</x-slot>

    <div>
        <h1 class="font-serif text-3xl font-black text-stone-900 mb-2">Buat Akun Baru</h1>
        <p class="text-stone-500 text-sm mb-8">Bergabunglah dan nikmati kemudahan reservasi meja Ruang Rasa.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-stone-700 mb-1.5">Nama Lengkap</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap Anda"
                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none text-stone-900 text-sm transition-all placeholder-stone-400"
            >
            @error('name')
                <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-stone-700 mb-1.5">Alamat Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="contoh@email.com"
                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none text-stone-900 text-sm transition-all placeholder-stone-400"
            >
            @error('email')
                <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-stone-700 mb-1.5">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Minimal 8 karakter"
                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none text-stone-900 text-sm transition-all placeholder-stone-400"
            >
            @error('password')
                <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-stone-700 mb-1.5">Konfirmasi Password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password Anda"
                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none text-stone-900 text-sm transition-all placeholder-stone-400"
            >
            @error('password_confirmation')
                <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full py-3.5 bg-gradient-to-r from-amber-800 to-amber-900 hover:from-amber-900 hover:to-amber-950 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 text-sm">
            Daftar & Mulai Reservasi
        </button>
    </form>

    <!-- Login link -->
    <p class="text-center text-sm text-stone-500 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-amber-800 font-semibold hover:text-amber-950 transition-colors">
            Masuk di sini
        </a>
    </p>

    <div class="mt-8 pt-6 border-t border-stone-100 text-center">
        <a href="/" class="text-xs text-stone-400 hover:text-stone-600 transition-colors inline-flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke halaman utama
        </a>
    </div>
</x-guest-layout>
