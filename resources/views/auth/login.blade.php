<x-guest-layout>
    <x-slot name="title">Masuk</x-slot>

    <div>
        <h1 class="font-serif text-3xl font-black text-stone-900 mb-2">Masuk ke Akun</h1>
        <p class="text-stone-500 text-sm mb-8">Selamat datang kembali! Masuk untuk melanjutkan reservasi Anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-stone-700 mb-1.5">Alamat Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
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
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-semibold text-stone-700">Password</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-amber-700 hover:text-amber-900 font-medium transition-colors">
                        Lupa password?
                    </a>
                @endif
            </div>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl border border-stone-200 bg-white focus:border-amber-500 focus:ring-2 focus:ring-amber-200 focus:outline-none text-stone-900 text-sm transition-all placeholder-stone-400"
            >
            @error('password')
                <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
                class="w-4 h-4 rounded border-stone-300 text-amber-700 focus:ring-amber-500 cursor-pointer">
            <label for="remember_me" class="ms-2 text-sm text-stone-600 cursor-pointer select-none">
                Ingat saya
            </label>
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full py-3.5 bg-gradient-to-r from-amber-800 to-amber-900 hover:from-amber-900 hover:to-amber-950 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 text-sm">
            Masuk ke Ruang Rasa
        </button>
    </form>

    <!-- Register link -->
    <p class="text-center text-sm text-stone-500 mt-6">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-amber-800 font-semibold hover:text-amber-950 transition-colors">
            Daftar sekarang gratis
        </a>
    </p>

    <div class="mt-8 pt-6 border-t border-stone-100 text-center">
        <a href="/" class="text-xs text-stone-400 hover:text-stone-600 transition-colors inline-flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke halaman utama
        </a>
    </div>
</x-guest-layout>
