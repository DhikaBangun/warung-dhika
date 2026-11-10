<!-- ```blade -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->judul }} | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex flex-col bg-stone-50 text-stone-800">

    <!-- {{-- NAVBAR --}} -->
    <nav class="bg-white shadow-sm border-b border-stone-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="min-h-16 flex flex-wrap items-center justify-between gap-4 py-3">

                <a href="{{ route('home') }}"
                   class="text-xl font-bold text-orange-700 shrink-0">
                    Warung Dhika
                </a>

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
                       class="text-orange-700 font-semibold">
                        Artikel
                    </a>

                    <a href="{{ route('kontak') }}"
                       class="text-stone-600 hover:text-orange-700 transition">
                        Kontak
                    </a>

                    @guest
                        <a href="{{ route('login') }}"
                           class="bg-orange-500 text-white px-3 py-2 rounded-lg hover:bg-orange-600 transition">
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
        </div>
    </nav>

    <!-- {{-- KONTEN ARTIKEL --}} -->
    <main class="flex-1 w-full max-w-3xl mx-auto px-4 py-8">

        <a href="{{ route('blog.index') }}"
           class="inline-flex items-center gap-2 text-orange-700 hover:text-orange-900 hover:underline text-sm font-medium">
            ← Kembali ke Artikel
        </a>

        <article class="mt-6 bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">

            <!-- {{-- GAMBAR ARTIKEL --}} -->
            @if ($post->gambar)
                <img
                    src="{{ asset('storage/' . $post->gambar) }}"
                    alt="{{ $post->judul }}"
                    class="class="w-full max-h-72 object-cover""
                >
            @endif

            {{-- ISI ARTIKEL --}}
            <div class="p-5 md:p-7">

                <p class="text-sm text-stone-500 mb-4">
                    {{ $post->created_at->format('d M Y') }}
                </p>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-stone-900">
                    {{ $post->judul }}
                </h1>

                @if ($post->ringkasan)
                    <p class="mt-6 text-lg md:text-xl text-stone-600 leading-relaxed">
                        {{ $post->ringkasan }}
                    </p>
                @endif

                <div class="border-t border-stone-200 my-8"></div>

                <div class="text-stone-700 text-base md:text-lg leading-8 whitespace-pre-line break-words">
                    {{ $post->isi }}
                </div>

            </div>
        </article>

        {{-- TOMBOL ARTIKEL LAINNYA --}}
        <div class="mt-8 flex justify-center">
            <a href="{{ route('blog.index') }}"
               class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                ← Lihat Artikel Lainnya
            </a>
        </div>

    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-stone-200 border-b-4 border-b-orange-600 bg-white text-center text-sm text-stone-500 py-6 mt-8">
        &copy; {{ date('Y') }} Warung Dhika. Semua hak dilindungi.
    </footer>

</body>
</html>