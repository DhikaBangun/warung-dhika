
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Dhika | Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800">



<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-stone-200">
    <div class="max-w-6xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-4">

        <!-- Logo -->
        <a href="{{ route('home') }}"
           class="text-xl font-bold text-orange-700 shrink-0">
            Warung Dhika
        </a>

        <!-- Navigasi -->
        <div class="flex flex-wrap items-center gap-4 md:gap-5 text-sm font-medium">

            <a href="{{ route('home') }}"
               class="text-orange-700 font-semibold">
                Beranda
            </a>

            <a href="{{ route('menu') }}"
               class="text-stone-600 hover:text-orange-700 transition">
                Menu
            </a>

            <a href="{{ route('pesan') }}"
               class="text-stone-600 hover:text-orange-700 transition">
                Pesan
            </a>

            <a href="{{ route('tentang') }}"
               class="text-stone-600 hover:text-orange-700 transition">
                Tentang
            </a>                
            <a href="{{ route('blog.index') }}"
                class="text-stone-600 hover:text-orange-700 transition">
                Artikel
            </a>

            <a href="{{ route('kontak') }}"
               class="text-stone-600 hover:text-orange-700 transition">
                Kontak
            </a>

            @guest
                <a href="{{ route('login') }}"
                   class="bg-orange-400 text-white px-3 py-2 rounded-lg hover:bg-orange-600 transition">
                    Sign In
                </a>

                <a href="{{ route('register') }}"
                   class="bg-orange-700 text-white px-3 py-2 rounded-lg hover:bg-orange-800 transition">
                    Sign Up
                </a>
            @endguest

            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-orange-700 hover:text-orange-900 transition">
                        Panel Admin
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-orange-700 text-white px-3 py-2 rounded-lg hover:bg-orange-800 transition">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>



<main>
    <section class="max-w-6xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-10 items-center">

        <div>
            <p class="text-orange-700 font-semibold mb-3">Masakan rumahan, rasa istimewa</p>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-5">
                Makan enak tidak harus mahal.
            </h1>
            <p class="text-stone-600 leading-7 mb-7">
                Nikmati aneka makanan rumahan, camilan, dan minuman
                dengan harga bersahabat untuk menemani harimu.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('menu') }}"
                   class="bg-orange-700 text-white px-6 py-3 rounded-lg hover:bg-orange-800">
                    Lihat Menu
                </a>
                <a href="{{ route('pesan') }}"
                   class="border border-stone-300 px-6 py-3 rounded-lg hover:bg-stone-100">
                    Pesan Sekarang
                </a>
            </div>
        </div>

        <div>
            <img
                src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=1000&q=80"
                alt="Hidangan makanan"
                class="w-full h-80 object-cover rounded-2xl"
            >
        </div>
    </section>

    <section class="bg-white py-14">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-between items-end gap-4 mb-8">
                <div>
                    <p class="text-orange-700 font-semibold">Pilihan pelanggan</p>
                    <h2 class="text-3xl font-bold mt-2">Menu favorit</h2>
                </div>
                <a href="{{ route('menu') }}" class="text-orange-700 font-semibold">
                    Semua menu →
                </a>
            </div>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                <article class="border border-stone-200 rounded-xl overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDcILJ3QlOZlUmDx7xInVQDXbPnekZR8yhtsjtC6aPNA&s=10"
                         alt="Nasi goreng" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg">Nasi Goreng </h3>
                        <p class="text-stone-500 text-sm mt-1">Gurih dan mengenyangkan.</p>
                        <p class="text-orange-700 font-bold mt-3">Rp25.000</p>
                    </div>
                </article>

                <article class="border border-stone-200 rounded-xl overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRafh0ZyWxp6WQCUGZYRn1yXEwJ0MDQKqX014VEmTSO3g&s=10"
                         alt="Pizza" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg">Mie Ayam</h3>
                        <p class="text-stone-500 text-sm mt-1">Kalau tidak nasi ya... makan mie.</p>
                        <p class="text-orange-700 font-bold mt-3">Rp15.000</p>
                    </div>
                </article>

                <article class="border border-stone-200 rounded-xl overflow-hidden">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHTJCVPdUam9YrQrkaP2PWAvRsGFtRf949rvXvSWdg8g&s=10"
                         alt="Minuman segar" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <h3 class="font-bold text-lg">Es Teh Manis</h3>
                        <p class="text-stone-500 text-sm mt-1">Segar diminum kapan saja.</p>
                        <p class="text-orange-700 font-bold mt-3">Rp8.000</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-14">
        <div class="bg-orange-100 rounded-2xl p-8 md:p-10 flex flex-col md:flex-row justify-between gap-6 items-center">
            <div>
                <h2 class="text-2xl font-bold">Sudah tahu mau makan apa?</h2>
                <p class="text-stone-600 mt-2">Lihat pilihan menu dan tentukan pesananmu.</p>
            </div>
            <a href="{{ route('pesan') }}"
               class="bg-orange-700 text-white px-6 py-3 rounded-lg hover:bg-orange-800">
                Buat Pesanan
            </a>
        </div>
    </section>
</main>

<footer class="bg-stone-900 text-stone-300 text-center px-6 py-6">
    <p>© 2026 Warung Dhika.</p>
</footer>

</body>
</html>
