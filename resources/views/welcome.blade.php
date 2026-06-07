<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruang Rasa — Restoran Nusantara Premium</title>
    <meta name="description" content="Ruang Rasa adalah restoran nusantara premium yang menyajikan cita rasa otentik Indonesia dalam suasana elegan. Reservasi meja Anda sekarang.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .hero-bg {
            background: linear-gradient(135deg, #1a0a00 0%, #3d1a00 40%, #1a0a00 100%);
        }
        .hero-pattern {
            background-image: radial-gradient(circle at 20% 50%, rgba(180, 83, 9, 0.15) 0%, transparent 50%),
                              radial-gradient(circle at 80% 20%, rgba(120, 53, 15, 0.2) 0%, transparent 40%),
                              radial-gradient(circle at 60% 80%, rgba(146, 64, 14, 0.1) 0%, transparent 40%);
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .menu-badge {
            background: linear-gradient(135deg, #b45309, #92400e);
        }
        .btn-primary {
            background: linear-gradient(135deg, #b45309, #92400e);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #92400e, #78350f);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(180, 83, 9, 0.4);
        }
        .section-divider {
            background: linear-gradient(90deg, transparent, #b45309, transparent);
            height: 1px;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .floating { animation: float 4s ease-in-out infinite; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in-up { animation: fadeInUp 0.8s ease forwards; }
        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
        .delay-400 { animation-delay: 0.4s; opacity: 0; }
    </style>
</head>
<body class="antialiased bg-stone-50">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="font-serif font-black text-xl text-white tracking-wide">Ruang Rasa</span>
            </a>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#menu" class="text-amber-100/80 hover:text-amber-300 text-sm font-medium transition-colors">Menu</a>
                <a href="#reservasi" class="text-amber-100/80 hover:text-amber-300 text-sm font-medium transition-colors">Reservasi</a>
                <a href="#tentang" class="text-amber-100/80 hover:text-amber-300 text-sm font-medium transition-colors">Tentang Kami</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary text-white px-5 py-2 rounded-full text-sm font-semibold">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-amber-100/80 hover:text-amber-300 text-sm font-medium transition-colors">Masuk</a>
                        <a href="{{ route('register') }}" class="btn-primary text-white px-5 py-2 rounded-full text-sm font-semibold">
                            Daftar Sekarang
                        </a>
                    @endauth
                @endif
            </div>
            <!-- Mobile menu button -->
            <button class="md:hidden text-white" id="mobile-menu-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg hero-pattern min-h-screen flex items-center relative overflow-hidden">
        <!-- Decorative circles -->
        <div class="absolute top-20 right-20 w-64 h-64 rounded-full border border-amber-700/20 floating" style="animation-delay: 0s;"></div>
        <div class="absolute bottom-20 left-10 w-40 h-40 rounded-full border border-amber-700/15 floating" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 right-10 w-24 h-24 rounded-full bg-amber-900/10 floating" style="animation-delay: 0.8s;"></div>

        <div class="max-w-7xl mx-auto px-6 pt-24 pb-16 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-flex items-center bg-amber-900/30 border border-amber-700/30 rounded-full px-4 py-2 mb-6 fade-in-up delay-100">
                    <span class="w-2 h-2 bg-amber-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-amber-300 text-xs font-medium tracking-widest uppercase">Restoran Nusantara Premium</span>
                </div>
                <h1 class="font-serif text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6 fade-in-up delay-200">
                    Cita Rasa<br>
                    <span class="text-amber-400">Nusantara</span><br>
                    yang Tak Terlupakan
                </h1>
                <p class="text-amber-100/70 text-lg leading-relaxed mb-8 max-w-md fade-in-up delay-300">
                    Rasakan keautentikan masakan Indonesia dalam suasana elegan yang penuh kehangatan. Setiap hidangan adalah karya seni kuliner.
                </p>
                <div class="flex flex-wrap gap-4 fade-in-up delay-400">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/tables') }}" class="btn-primary text-white px-8 py-3.5 rounded-full font-semibold text-sm inline-flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Reservasi Sekarang
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn-primary text-white px-8 py-3.5 rounded-full font-semibold text-sm inline-flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Reservasi Sekarang
                            </a>
                        @endauth
                    @endif
                    <a href="#menu" class="border border-amber-600/50 text-amber-300 hover:bg-amber-900/30 px-8 py-3.5 rounded-full font-semibold text-sm inline-flex items-center gap-2 transition-all">
                        Lihat Menu
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                </div>

                <!-- Stats -->
                <div class="flex gap-8 mt-10 fade-in-up delay-400">
                    <div>
                        <div class="text-2xl font-serif font-black text-amber-400">50+</div>
                        <div class="text-amber-100/50 text-xs mt-1">Menu Pilihan</div>
                    </div>
                    <div class="w-px bg-amber-800/40"></div>
                    <div>
                        <div class="text-2xl font-serif font-black text-amber-400">10</div>
                        <div class="text-amber-100/50 text-xs mt-1">Meja Eksklusif</div>
                    </div>
                    <div class="w-px bg-amber-800/40"></div>
                    <div>
                        <div class="text-2xl font-serif font-black text-amber-400">5★</div>
                        <div class="text-amber-100/50 text-xs mt-1">Rating Pelanggan</div>
                    </div>
                </div>
            </div>

            <!-- Hero visual -->
            <div class="hidden md:flex justify-center items-center relative">
                <div class="relative w-80 h-80">
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-amber-800/30 to-amber-950/50 border border-amber-700/20"></div>
                    <div class="absolute inset-8 rounded-full bg-gradient-to-br from-amber-700/20 to-amber-900/40 border border-amber-600/20 flex items-center justify-center">
                        <div class="text-center">
                            <div class="text-8xl mb-3">🍛</div>
                            <p class="font-serif text-amber-200 font-bold text-lg">Sajian Terbaik</p>
                            <p class="text-amber-400/70 text-xs mt-1">Setiap hari untukmu</p>
                        </div>
                    </div>
                    <!-- Floating food icons -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-amber-900/40 border border-amber-700/30 rounded-2xl flex items-center justify-center text-3xl floating" style="animation-delay:0.3s">🥘</div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-amber-900/40 border border-amber-700/30 rounded-2xl flex items-center justify-center text-3xl floating" style="animation-delay:1.2s">🍜</div>
                    <div class="absolute top-1/2 -right-10 w-14 h-14 bg-amber-900/40 border border-amber-700/30 rounded-2xl flex items-center justify-center text-2xl floating" style="animation-delay:0.8s">🥗</div>
                    <div class="absolute top-0 -left-8 w-14 h-14 bg-amber-900/40 border border-amber-700/30 rounded-2xl flex items-center justify-center text-2xl floating" style="animation-delay:2s">🍢</div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-amber-500/50 flex flex-col items-center gap-2">
            <span class="text-xs tracking-widest uppercase">Scroll</span>
            <div class="w-px h-8 bg-gradient-to-b from-amber-500/50 to-transparent animate-pulse"></div>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <p class="text-amber-700 text-sm font-semibold tracking-widest uppercase mb-3">Pilihan Kami</p>
                <h2 class="font-serif text-4xl md:text-5xl font-black text-stone-900 mb-4">Menu Andalan Kami</h2>
                <p class="text-stone-500 max-w-xl mx-auto leading-relaxed">Diolah dari bahan segar pilihan dengan resep turun-temurun yang telah disempurnakan oleh Chef berpengalaman kami.</p>
                <div class="section-divider max-w-xs mx-auto mt-6"></div>
            </div>

            <!-- Category tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="px-6 py-2.5 bg-amber-800 text-white rounded-full text-sm font-semibold">Semua</button>
                <button class="px-6 py-2.5 bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-800 rounded-full text-sm font-semibold transition-colors">🍛 Makanan Utama</button>
                <button class="px-6 py-2.5 bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-800 rounded-full text-sm font-semibold transition-colors">🥗 Pembuka</button>
                <button class="px-6 py-2.5 bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-800 rounded-full text-sm font-semibold transition-colors">🍰 Penutup</button>
                <button class="px-6 py-2.5 bg-stone-100 text-stone-600 hover:bg-amber-50 hover:text-amber-800 rounded-full text-sm font-semibold transition-colors">🥤 Minuman</button>
            </div>

            <!-- Menu Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $menus = [
                    ['emoji'=>'🍛','name'=>'Rendang Wagyu','category'=>'Makanan Utama','desc'=>'Daging wagyu grade premium dimasak slow-cook 6 jam dengan rempah Minang otentik.','price'=>'Rp 185.000','badge'=>'Best Seller'],
                    ['emoji'=>'🦐','name'=>'Soto Seafood Spesial','category'=>'Makanan Utama','desc'=>'Kuah bening segar dengan udang, cumi, dan kerang pilihan dipadu bumbu kunyit rempah.','price'=>'Rp 125.000','badge'=>null],
                    ['emoji'=>'🍜','name'=>'Mie Lethek Spesial','category'=>'Makanan Utama','desc'=>'Mie lethek tradisional Yogyakarta dengan ayam kampung, telur, dan sayur pilihan.','price'=>'Rp 85.000','badge'=>null],
                    ['emoji'=>'🥗','name'=>'Gado-Gado Istimewa','category'=>'Pembuka','desc'=>'Sayuran segar rebus dengan bumbu kacang homemade yang kental dan gurih sempurna.','price'=>'Rp 65.000','badge'=>null],
                    ['emoji'=>'🍢','name'=>'Sate Lilit Bali','category'=>'Pembuka','desc'=>'Sate lilit daging ikan segar khas Bali dengan bumbu genep dan daun lemon.','price'=>'Rp 75.000','badge'=>'New'],
                    ['emoji'=>'🍰','name'=>'Klepon Lava Cake','category'=>'Penutup','desc'=>'Inovasi dessert modern — klepon berbentuk lava cake dengan isian gula merah cair.','price'=>'Rp 55.000','badge'=>'Chef Special'],
                    ['emoji'=>'🥤','name'=>'Es Teh Tarik Pandan','category'=>'Minuman','desc'=>'Teh tarik susu premium dengan aroma pandan segar disajikan dingin menyegarkan.','price'=>'Rp 35.000','badge'=>null],
                    ['emoji'=>'🥥','name'=>'Es Kelapa Muda Nira','category'=>'Minuman','desc'=>'Kelapa muda segar dicampur nira aren pilihan untuk kesegaran alami maksimal.','price'=>'Rp 40.000','badge'=>null],
                    ['emoji'=>'🍮','name'=>'Puding Jahe Susu','category'=>'Penutup','desc'=>'Puding susu lembut dengan infusi jahe segar dan siraman karamel gula aren.','price'=>'Rp 45.000','badge'=>null],
                ];
                @endphp

                @foreach($menus as $menu)
                <div class="card-hover bg-white rounded-2xl border border-stone-100 overflow-hidden shadow-sm hover:shadow-xl">
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 h-44 flex items-center justify-center relative">
                        <span class="text-7xl">{{ $menu['emoji'] }}</span>
                        @if($menu['badge'])
                        <span class="absolute top-3 left-3 menu-badge text-white text-xs font-bold px-3 py-1 rounded-full">
                            {{ $menu['badge'] }}
                        </span>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="text-xs text-amber-700 font-semibold uppercase tracking-wider mb-1">{{ $menu['category'] }}</div>
                        <h3 class="font-serif font-bold text-lg text-stone-900 mb-2">{{ $menu['name'] }}</h3>
                        <p class="text-stone-500 text-sm leading-relaxed mb-4">{{ $menu['desc'] }}</p>
                        <div class="flex items-center justify-between">
                            <span class="font-serif font-black text-amber-800 text-lg">{{ $menu['price'] }}</span>
                            <span class="text-xs text-stone-400">/ porsi</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Reservation CTA Section -->
    <section id="reservasi" class="py-24 bg-gradient-to-br from-stone-900 via-amber-950 to-stone-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,...');"></div>
        <div class="max-w-4xl mx-auto px-6 text-center relative">
            <p class="text-amber-400 text-sm font-semibold tracking-widest uppercase mb-4">Jangan Ketinggalan</p>
            <h2 class="font-serif text-4xl md:text-5xl font-black text-white mb-6">
                Reservasi Meja Anda<br>Sekarang Juga
            </h2>
            <p class="text-amber-100/70 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
                Dapatkan pengalaman makan malam terbaik di Ruang Rasa. Pilih meja favorit Anda, tentukan waktu, dan nikmati momen spesial bersama orang-orang terkasih.
            </p>

            <!-- Steps -->
            <div class="grid grid-cols-3 gap-6 mb-12">
                @php
                $steps = [
                    ['icon'=>'🪑','step'=>'01','title'=>'Pilih Meja','desc'=>'Pilih meja sesuai jumlah tamu'],
                    ['icon'=>'📅','step'=>'02','title'=>'Isi Form','desc'=>'Tentukan tanggal dan jam'],
                    ['icon'=>'✅','step'=>'03','title'=>'Konfirmasi','desc'=>'Tunggu konfirmasi dari kami'],
                ];
                @endphp
                @foreach($steps as $step)
                <div class="text-center">
                    <div class="w-14 h-14 bg-amber-900/40 border border-amber-700/30 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-3">{{ $step['icon'] }}</div>
                    <div class="text-amber-600 text-xs font-bold tracking-widest mb-1">{{ $step['step'] }}</div>
                    <div class="text-white font-semibold text-sm mb-1">{{ $step['title'] }}</div>
                    <div class="text-amber-100/50 text-xs">{{ $step['desc'] }}</div>
                </div>
                @endforeach
            </div>

            @auth
                <a href="{{ url('/tables') }}" class="btn-primary text-white px-10 py-4 rounded-full font-bold text-base inline-flex items-center gap-3 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Reservasi Meja Sekarang
                </a>
            @else
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('register') }}" class="btn-primary text-white px-10 py-4 rounded-full font-bold text-base inline-flex items-center gap-3 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Daftar & Reservasi
                    </a>
                    <a href="{{ route('login') }}" class="border border-amber-600/40 text-amber-300 hover:bg-amber-900/30 px-10 py-4 rounded-full font-bold text-base inline-flex items-center gap-2 transition-all">
                        Sudah punya akun? Masuk
                    </a>
                </div>
            @endauth
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-24 bg-amber-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-amber-700 text-sm font-semibold tracking-widest uppercase mb-3">Tentang Kami</p>
                <h2 class="font-serif text-4xl font-black text-stone-900 mb-6">Warisan Rasa yang Kami Jaga</h2>
                <p class="text-stone-600 leading-relaxed mb-6">
                    Ruang Rasa hadir sebagai ruang perayaan cita rasa nusantara yang kaya. Berdiri sejak 2018, kami telah melayani ribuan tamu dengan sajian otentik yang diolah dari bahan-bahan segar pilihan terbaik.
                </p>
                <p class="text-stone-600 leading-relaxed mb-8">
                    Chef kami terlatih di dapur-dapur ternama Indonesia dan telah menghabiskan bertahun-tahun mendalami kekayaan kuliner dari Sabang sampai Merauke untuk menghadirkan pengalaman kuliner yang tak terlupakan.
                </p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-amber-100">
                        <div class="text-3xl font-serif font-black text-amber-800 mb-1">8+</div>
                        <div class="text-stone-500 text-sm">Tahun Berpengalaman</div>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-amber-100">
                        <div class="text-3xl font-serif font-black text-amber-800 mb-1">10K+</div>
                        <div class="text-stone-500 text-sm">Tamu Puas</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-amber-800 to-amber-950 rounded-3xl p-8 text-center shadow-2xl">
                    <div class="text-8xl mb-4">👨‍🍳</div>
                    <div class="font-serif text-white text-2xl font-bold mb-2">Chef Maestro</div>
                    <div class="text-amber-300/80 text-sm mb-6">Ahli Masakan Nusantara</div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-amber-900/50 rounded-xl p-3 text-center">
                            <div class="text-2xl mb-1">🏆</div>
                            <div class="text-amber-200 text-xs">Award Winner</div>
                        </div>
                        <div class="bg-amber-900/50 rounded-xl p-3 text-center">
                            <div class="text-2xl mb-1">📚</div>
                            <div class="text-amber-200 text-xs">50+ Resep</div>
                        </div>
                        <div class="bg-amber-900/50 rounded-xl p-3 text-center">
                            <div class="text-2xl mb-1">⭐</div>
                            <div class="text-amber-200 text-xs">5 Bintang</div>
                        </div>
                    </div>
                </div>
                <!-- Decorative element -->
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-amber-200 rounded-full opacity-40 -z-10"></div>
                <div class="absolute -top-6 -right-6 w-20 h-20 bg-amber-300 rounded-full opacity-30 -z-10"></div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <p class="text-amber-700 text-sm font-semibold tracking-widest uppercase mb-3">Kata Mereka</p>
                <h2 class="font-serif text-4xl font-black text-stone-900">Pelanggan Bahagia Kami</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                $testimonials = [
                    ['name'=>'Anisa R.','rating'=>5,'text'=>'Rendang di sini benar-benar autentik! Dagingnya empuk dan bumbu meresap sempurna. Wajib dikunjungi!','role'=>'Food Blogger'],
                    ['name'=>'Budi H.','rating'=>5,'text'=>'Suasana restoran sangat nyaman dan elegan. Cocok untuk makan malam romantis atau acara keluarga istimewa.','role'=>'Pelanggan Setia'],
                    ['name'=>'Sari D.','rating'=>5,'text'=>'Sistem reservasi onlinenya sangat mudah digunakan. Meja sudah siap begitu kami datang. Pelayanan top!','role'=>'Profesional'],
                ];
                @endphp
                @foreach($testimonials as $t)
                <div class="bg-stone-50 rounded-2xl p-6 border border-stone-100">
                    <div class="flex gap-1 mb-4">
                        @for($i=0; $i<5; $i++)
                            <svg class="w-4 h-4 text-amber-500 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed mb-4 italic">"{{ $t['text'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-gradient-to-br from-amber-700 to-amber-900 rounded-full flex items-center justify-center text-white text-xs font-bold">{{ substr($t['name'],0,1) }}</div>
                        <div>
                            <div class="font-semibold text-stone-800 text-sm">{{ $t['name'] }}</div>
                            <div class="text-stone-400 text-xs">{{ $t['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-400 py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span class="font-serif font-black text-lg text-white">Ruang Rasa</span>
                </div>
                <div class="text-sm text-stone-500">
                    Buka setiap hari · 11:00 – 22:00 WIB · Jl. Kuliner Nusantara No. 88
                </div>
                <div class="text-xs text-stone-600">
                    © {{ date('Y') }} Ruang Rasa. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-stone-900/95', 'backdrop-blur-md', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-stone-900/95', 'backdrop-blur-md', 'shadow-lg');
            }
        });
    </script>
</body>
</html>
