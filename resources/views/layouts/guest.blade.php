<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Masuk' }} — Ruang Rasa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .auth-bg {
            background: linear-gradient(135deg, #1a0a00 0%, #3d1a00 50%, #1a0a00 100%);
        }
        .auth-pattern {
            background-image: radial-gradient(circle at 20% 30%, rgba(180, 83, 9, 0.2) 0%, transparent 50%),
                              radial-gradient(circle at 80% 70%, rgba(120, 53, 15, 0.15) 0%, transparent 40%);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .floating { animation: float 4s ease-in-out infinite; }
    </style>
</head>
<body class="antialiased min-h-screen flex">

    <!-- Left Panel - Branding -->
    <div class="hidden lg:flex lg:w-1/2 auth-bg auth-pattern flex-col justify-between p-12 relative overflow-hidden">
        <!-- Decorative circles -->
        <div class="absolute top-20 right-20 w-48 h-48 rounded-full border border-amber-700/20 floating" style="animation-delay:0s"></div>
        <div class="absolute bottom-40 left-10 w-32 h-32 rounded-full border border-amber-700/15 floating" style="animation-delay:1.5s"></div>

        <!-- Logo -->
        <a href="/" class="flex items-center gap-3 z-10">
            <svg class="w-9 h-9 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <span class="font-serif font-black text-2xl text-white">Ruang Rasa</span>
        </a>

        <!-- Center Content -->
        <div class="z-10">
            <div class="text-8xl mb-6 text-center">🍛</div>
            <h2 class="font-serif text-4xl font-black text-white mb-4 leading-tight">
                Selamat Datang<br>
                <span class="text-amber-400">Kembali!</span>
            </h2>
            <p class="text-amber-100/70 text-base leading-relaxed mb-8 max-w-sm">
                Masuk untuk menikmati kemudahan reservasi meja dan pengalaman kuliner nusantara terbaik bersama kami.
            </p>

            <!-- Features list -->
            <div class="space-y-3">
                @php
                $features = [
                    '🪑 Pilih dan reservasi meja dengan mudah',
                    '📅 Lihat riwayat reservasi Anda',
                    '✅ Pantau status konfirmasi reservasi',
                ];
                @endphp
                @foreach($features as $f)
                <div class="flex items-center gap-3 text-amber-100/80 text-sm">
                    <span class="text-lg">{{ explode(' ', $f)[0] }}</span>
                    <span>{{ implode(' ', array_slice(explode(' ', $f), 1)) }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Footer branding -->
        <div class="z-10 text-amber-800/60 text-xs">
            © {{ date('Y') }} Ruang Rasa · Restoran Nusantara Premium
        </div>
    </div>

    <!-- Right Panel - Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-stone-50">
        <div class="w-full max-w-md">
            <!-- Mobile logo -->
            <div class="lg:hidden flex items-center gap-3 mb-8 justify-center">
                <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="font-serif font-black text-xl text-amber-900">Ruang Rasa</span>
            </div>

            {{ $slot }}
        </div>
    </div>
</body>
</html>
