
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-50 text-stone-800">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-stone-200">
        <div class="max-w-6xl mx-auto px-6 py-4 flex flex-wrap justify-between items-center gap-4">

            <a href="{{ route('home') }}"
               class="text-xl font-bold text-orange-700">
                Warung Dhika
            </a>

            <div class="flex flex-wrap items-center gap-4 md:gap-5 text-sm font-medium">

                <a href="{{ route('home') }}"
                   class="text-stone-600 hover:text-orange-700">Beranda</a>

                <a href="{{ route('menu') }}"
                   class="text-stone-600 hover:text-orange-700">Menu</a>

                <a href="{{ route('pesan') }}"
                   class="text-stone-600 hover:text-orange-700">Pesan</a>

                <a href="{{ route('tentang') }}"
                   class="text-orange-700 font-semibold">Tentang</a>
                
                <a href="{{ route('blog.index') }}"
                   class="text-stone-600 hover:text-orange-700">
                    Artikel
                </a>

                <a href="{{ route('kontak') }}"
                   class="text-stone-600 hover:text-orange-700">Kontak</a>

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
    <header class="max-w-6xl mx-auto px-6 py-14 text-center">
        <p class="text-orange-700 font-semibold mb-3">Kenali Kami Lebih Dekat</p>

        <h1 class="text-4xl md:text-5xl font-bold">
            Tentang Warung Dhika
        </h1>

        <p class="text-stone-600 leading-7 max-w-2xl mx-auto mt-5">
            Tempat untuk menikmati makanan rumahan, camilan, dan minuman
            dengan harga bersahabat.
        </p>
    </header>

    <main class="max-w-6xl mx-auto px-6 pb-16">

        <!-- Cerita Warung -->
        <section class="grid md:grid-cols-2 gap-10 items-center mb-16">

            <div>
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwO5BfS_IBc296BM-e0OvVnWah-ISgYnVL4iB2ooSHqw&s=10"
                    alt="Hidangan makanan"
                    class="w-full h-72 md:h-96 object-cover rounded-2xl shadow-sm"
                >
            </div>

            <div>
                <p class="text-orange-700 font-semibold">Cerita Kami</p>

                <h2 class="text-3xl font-bold mt-2 mb-5">
                    Sajian Sederhana, Rasa yang Istimewa
                </h2>

                <p class="text-stone-600 leading-7 mb-4">
                    Warung Dhika hadir sebagai pilihan untuk kamu yang ingin
                    menikmati makanan dan minuman dengan harga bersahabat.
                    Kami menyediakan beragam pilihan menu untuk menemani
                    waktu makan dan santaimu.
                </p>

                <p class="text-stone-600 leading-7">
                    Melalui website ini, kamu dapat melihat pilihan menu
                    dan melanjutkan ke halaman pemesanan dengan lebih mudah.
                    Kami berharap pengalaman memilih menu menjadi lebih
                    praktis dan nyaman.
                </p>
            </div>

        </section>

        <!-- Nilai Warung -->
        <section class="mb-16">
            <div class="text-center mb-8">
                <p class="text-orange-700 font-semibold">Mengapa Warung Dhika?</p>
                <h2 class="text-3xl font-bold mt-2">Yang Kami Utamakan</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <article class="bg-white border border-stone-200 rounded-2xl p-6">
                    <div class="w-12 h-12 bg-orange-100 text-orange-700 rounded-xl flex items-center justify-center text-2xl">
                        🍛
                    </div>

                    <h3 class="font-bold text-xl mt-4">Pilihan Menu</h3>

                    <p class="text-stone-600 leading-6 mt-2">
                        Tersedia pilihan makanan utama, makanan ringan,
                        dan minuman untuk berbagai selera.
                    </p>
                </article>

                <article class="bg-white border border-stone-200 rounded-2xl p-6">
                    <div class="w-12 h-12 bg-orange-100 text-orange-700 rounded-xl flex items-center justify-center text-2xl">
                        💰
                    </div>

                    <h3 class="font-bold text-xl mt-4">Harga Bersahabat</h3>

                    <p class="text-stone-600 leading-6 mt-2">
                        Kami ingin memberikan pilihan menu dengan harga
                        yang mudah dilihat sebelum pelanggan memesan.
                    </p>
                </article>

                <article class="bg-white border border-stone-200 rounded-2xl p-6">
                    <div class="w-12 h-12 bg-orange-100 text-orange-700 rounded-xl flex items-center justify-center text-2xl">
                        🛒
                    </div>

                    <h3 class="font-bold text-xl mt-4">Pemesanan Praktis</h3>

                    <p class="text-stone-600 leading-6 mt-2">
                        Website membantu pelanggan melihat menu dan
                        mengakses halaman pemesanan dengan mudah.
                    </p>
                </article>

            </div>
        </section>

        <!-- Ajakan -->
        <section class="bg-orange-100 rounded-2xl p-8 md:p-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h2 class="text-2xl font-bold">Yuk, Lihat Menu Kami!</h2>

                <p class="text-stone-600 mt-2">
                    Temukan pilihan makanan dan minuman favoritmu.
                </p>
            </div>

            <a href="{{ route('menu') }}"
               class="bg-orange-700 text-white px-6 py-3 rounded-lg hover:bg-orange-800 transition">
                Lihat Menu
            </a>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300 text-center px-6 py-6">
        <p>© {{ date('Y') }} Warung Dhika.</p>
    </footer>

</body>
</html>
