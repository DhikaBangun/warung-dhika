
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | Warung Dhika</title>
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
            <a href="{{ route('menu') }}" class="hover:text-orange-700">Menu</a>
            <a href="{{ route('pesan') }}" class="hover:text-orange-700">Pesan</a>
            <a href="{{ route('tentang') }}" class="hover:text-orange-700">Tentang</a>                
                <a href="{{ route('blog.index') }}"
                   class="text-stone-600 hover:text-orange-700">
                    Artikel
                </a>
            <a href="{{ route('kontak') }}" class="text-orange-700 font-semibold">Kontak</a>

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

<main class="max-w-5xl mx-auto px-6 py-12">
    <p class="text-orange-700 font-semibold">Kami siap melayani</p>
    <h1 class="text-3xl md:text-4xl font-bold mt-2">Hubungi Kami</h1>
    <p class="text-stone-600 mt-3 mb-10">
        Ingin bertanya tentang menu atau pesanan? Silakan hubungi Warung Sederhana.
    </p>

    <div class="grid md:grid-cols-2 gap-8">
        <section class="bg-white border border-stone-200 rounded-2xl p-7">
            <h2 class="text-xl font-bold mb-6">Informasi Warung</h2>

            <div class="mb-6">
                <h3 class="font-semibold">Alamat</h3>
                <p class="text-stone-600 mt-2">
                    Jl. Pancawarga No. 10, Jakarta Timur<br>
                </p>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold">Jam operasional</h3>
                <p class="text-stone-600 mt-2">Setiap hari, 06.00 - 22.00 WIB</p>
            </div>

            <div>
                <h3 class="font-semibold">Nomor WhatsApp</h3>
                <p class="text-stone-600 mt-2">+62 878-1318-9414</p>
            </div>
        </section>

        <section class="bg-orange-100 rounded-2xl p-7 flex flex-col justify-center">
            <h2 class="text-2xl font-bold">Ada yang ingin ditanyakan?</h2>
            <p class="text-stone-600 leading-7 mt-3 mb-6">
                Hubungi kami melalui WhatsApp untuk bertanya tentang menu, harga,
                atau ketersediaan makanan.
            </p>
            <a href="https://wa.me/6287813189414?text=Halo%20Warung%20Sederhana%2C%20saya%20ingin%20bertanya%20tentang%20menu."
               target="_blank" rel="noopener noreferrer"
               class="inline-block text-center bg-green-700 text-white px-6 py-3 rounded-lg hover:bg-green-800">
                Hubungi via WhatsApp
            </a>
        </section>
    </div>

    <div class="mt-10">
        <a href="{{ route('menu') }}" class="text-orange-700 font-semibold">← Kembali ke daftar menu</a>
    </div>
</main>

<footer class="bg-stone-900 text-stone-300 text-center px-6 py-6">
    <p>© 2026 Warung Dhika.</p>
</footer>

</body>
</html>
