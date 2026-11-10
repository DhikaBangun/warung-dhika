<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Disiapkan | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">

    <nav class="bg-white border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-4">

        <a href="{{ route('home') }}"
           class="text-xl font-bold text-orange-700">
            Warung Dhika
        </a>

        <div class="flex flex-wrap items-center gap-5 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-orange-700">Beranda</a>
            <a href="{{ route('menu') }}" class="hover:text-orange-700">Menu</a>
            <a href="{{ route('pesan') }}" class="text-orange-700 font-semibold">Pesan</a>
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

    <main class="flex-1 flex items-center justify-center px-6 py-12">
        <div class="bg-white border border-stone-200 rounded-2xl
                    p-8 md:p-12 max-w-lg w-full text-center shadow-sm">

            <div class="mx-auto mb-6 flex items-center justify-center
                        w-20 h-20 rounded-full bg-green-100">
                <svg class="w-10 h-10 text-green-700"
                     fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2.5"
                          d="M5 13l4 4L19 7">
                    </path>
                </svg>
            </div>

            <p class="text-orange-700 font-semibold mb-2">
                Warung Dhika
            </p>

            <h1 class="text-3xl font-bold mb-4">
                Pesanan berhasil dikirim!
            </h1>
            @if (session('pesanan_id'))
            <p class="text-stone-500 mb-4">
                Nomor pesanan:
                <strong>#{{ session('pesanan_id') }}</strong>
                </p>
            @endif

            <p class="text-stone-600 leading-relaxed mb-8">
                Terima kasih telah memesan di Warung Dhika.<br>
                Silakan simpan nomor pesanan
untuk memudahkan pengecekan status pesanan.
            </p>

                <a href="{{ route('home') }}"
                    class="block w-full border border-stone-300
                     px-6 py-3 rounded-lg font-semibold
                    hover:bg-stone-100 transition">
                    Kembali ke Home
                </a>

            

            <p class="text-xs text-stone-500 mt-6">
                Warung Dhika - Jl. Pancawarga No. 1, Kota Jakarta Timur, Indonesia
            </p>
        </div>
    </main>

    <footer class="bg-stone-900 text-stone-300 text-center px-6 py-5">
        <p>© 2026 Warung Dhika.</p>
    </footer>
</body>
</html>
