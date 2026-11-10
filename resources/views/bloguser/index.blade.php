
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel | Warung Dhika</title>
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
               class="text-stone-600 hover:text-orange-700 transition">
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
                class="text-orange-700 font-semibold transition">
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

    <main class="max-w-6xl mx-auto px-5 py-10">
        <header class="mb-8">
            <p class="text-orange-600 font-semibold text-sm">
                CERITA DARI WARUNG DHIKA
            </p>

            <h1 class="text-3xl font-bold mt-2">
                Artikel dan Informasi
            </h1>

            <p class="text-stone-500 mt-2">
                Temukan cerita, informasi, dan tips menarik seputar makanan.
            </p>
        </header>

        @if ($posts->isEmpty())
            <div class="bg-white border border-stone-200 rounded-xl p-8 text-center">
                <h2 class="text-xl font-semibold">
                    Belum ada artikel
                </h2>

                <p class="text-stone-500 mt-2">
                    Artikel baru akan hadir di sini.
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="bg-white rounded-xl overflow-hidden border border-stone-200 hover:shadow-md transition">

                        @if ($post->gambar)
                            <img
                                src="{{ asset('storage/' . $post->gambar) }}"
                                alt="{{ $post->judul }}"
                                class="w-full h-52 object-cover"
                            >
                        @endif

                        <div class="p-5">
                            <p class="text-xs text-stone-500 mb-2">
                                {{ $post->created_at->format('d M Y') }}
                            </p>

                            <h2 class="text-xl font-bold mb-3">
                                {{ $post->judul }}
                            </h2>

                            <p class="text-stone-600 text-sm leading-6">
                                {{ $post->ringkasan ?: \Illuminate\Support\Str::limit($post->isi, 120) }}
                            </p>

                            <a
                                href="{{ route('blog.show', $post->slug) }}"
                                class="inline-block mt-4 text-orange-600 font-semibold hover:text-orange-700"
                            >
                                Baca selengkapnya →
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </main>

    <footer class="text-center text-sm text-stone-500 py-6 mt-8 border-t border-stone-200">
        &copy; {{ date('Y') }} Warung Dhika
    </footer>

</body>
</html>
