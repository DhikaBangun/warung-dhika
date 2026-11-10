
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-50 text-stone-800">

    <nav class="bg-white border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-4">

        <a href="{{ route('home') }}"
           class="text-xl font-bold text-orange-700">
            Warung Dhika
        </a>

        <div class="flex flex-wrap items-center gap-5 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-orange-700">Beranda</a>
            <a href="{{ route('menu') }}" class="text-orange-700 font-semibold">Menu</a>
            <a href="{{ route('pesan') }}" class="hover:text-orange-700">Pesan</a>
             <a href="{{ route('tentang') }}" class="hover:text-orange-700">Tentang</a>                
                <a href="{{ route('blog.index') }}"
                   class="text-stone-600 hover:text-orange-700">
                    Artikel
                </a>
            <a href="{{ route('kontak') }}" class="hover:text-orange-700">Kontak</a>

            @guest
                <a href="{{ route('login') }}"
                   class="bg-orange-400 text-white px-3 py-2 rounded-lg hover:bg-orange-600">
                    Sign In
                </a>

                <a href="{{ route('register') }}"
                   class="bg-orange-700 text-white px-3 py-2 rounded-lg hover:bg-orange-800">
                    Sign Up
                </a>
            @endguest

            @auth

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-orange-700 hover:text-orange-900">
                        Panel Admin
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-orange-700 text-white px-3 py-2 rounded-lg hover:bg-orange-800">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>

    <!-- Header -->
    <header class="max-w-6xl mx-auto px-6 py-6">
        <p class="text-orange-700 font-semibold">Menu Warung</p>

        <h1 class="text-3xl md:text-4xl font-bold mt-2">
            Makanan dan Minuman
        </h1>

        <p class="text-stone-600 mt-3 max-w-2xl">
            Nikmati berbagai pilihan makanan rumahan, camilan, dan minuman
            dengan harga bersahabat.
        </p>
    </header>

    <main class="max-w-6xl mx-auto px-6 pb-16">

        
        <!-- daftar menu -->
        
<main class="max-w-6xl mx-auto px-6 pb-8">

    @php
        $kategoriMenu = [
            'Makanan Utama' => 'Pilihan makanan untuk menemani harimu.',
            'Makanan Ringan' => 'Camilan untuk menemani waktu santai.',
            'Minuman' => 'Minuman segar untuk menemani makananmu.',
        ];
    @endphp

    @foreach ($kategoriMenu as $kategori => $deskripsiKategori)
        <section class="mb-10" id="{{ Str::slug($kategori) }}">

            <div class="mb-5">
                <h2 class="text-2xl font-bold">{{ $kategori }}</h2>
                <p class="text-stone-500 text-sm mt-1">
                    {{ $deskripsiKategori }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                @forelse ($menus->where('kategori', $kategori) as $menu)
                    <article class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">

                        @if ($menu->gambar)
                            <img
                                src="{{ asset('storage/' . $menu->gambar) }}"
                                alt="{{ $menu->nama }}"
                                class="w-full h-40 object-cover"
                            >
                        @else
                            <div class="w-full h-40 bg-stone-100 flex items-center justify-center">
                                <span class="text-stone-500 text-sm">
                                    Belum ada gambar
                                </span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h3 class="font-bold text-lg">
                                {{ $menu->nama }}
                            </h3>

                            <p class="text-stone-500 text-sm mt-2">
                                {{ $menu->deskripsi }}
                            </p>

                            <div class="flex justify-between items-center mt-4 gap-2">
                                <span class="text-orange-700 font-bold">
                                    Rp{{ number_format($menu->harga, 0, ',', '.') }}
                                </span>

                                <a
                                    href="{{ route('pesan', ['menu' => $menu->id]) }}"
                                    class="bg-orange-700 text-white px-4 py-2 rounded-lg text-sm hover:bg-orange-800"
                                >
                                    Pesan
                                </a>
                            </div>
                        </div>

                    </article>
                @empty
                    <p class="text-stone-500 text-sm col-span-full">
                        Belum ada menu untuk kategori ini.
                    </p>
                @endforelse

            </div>
        </section>
    @endforeach

    <!-- Ajakan Memesan -->
    <section class="bg-orange-100 rounded-2xl p-6 md:p-8 flex flex-col md:flex-row justify-between gap-4 items-center">
        <div>
            <h2 class="text-2xl font-bold">Sudah tahu mau makan apa?</h2>
            <p class="text-stone-600 mt-2">
                Lanjutkan ke halaman pemesanan untuk mengisi rincian pesananmu.
            </p>
        </div>

        <a href="{{ route('pesan') }}"
           class="bg-orange-700 text-white px-6 py-3 rounded-lg hover:bg-orange-800">
            Pesan Sekarang
        </a>
    </section>

</main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300 text-center px-6 py-6">
        <p>© 2026 Warung Dhika.</p>
    </footer>

</body>
</html>
