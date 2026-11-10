
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Blog | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-50 text-stone-800">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-stone-200 hidden md:flex flex-col">
        <div class="p-6 border-b border-stone-100">
            <h1 class="text-xl font-bold text-orange-700">Warung Dhika</h1>
            <p class="text-sm text-stone-500 mt-1">Panel Admin</p>
        </div>

        <nav class="p-4 space-y-2 flex-1">
            <a href="{{ route('admin.dashboard') }}"
               class="block text-stone-600 hover:bg-stone-100 rounded-xl px-4 py-3">
                Dashboard
            </a>

            <a href="{{ route('admin.menu') }}"
               class="block text-stone-600 hover:bg-stone-100 rounded-xl px-4 py-3">
                Kelola Menu
            </a>

            <a href="{{ route('admin.pesanan') }}"
               class="block text-stone-600 hover:bg-stone-100 rounded-xl px-4 py-3">
                Pesanan
            </a>

            <a href="{{ route('admin.blog.index') }}"
               class="block bg-orange-50 text-orange-700 rounded-xl px-4 py-3 font-medium">
                Kelola Blog
            </a>
        </nav>

        <div class="p-4 border-t border-stone-100">
            <a href="{{ route('home') }}"
               class="block text-sm text-stone-500 hover:text-orange-700 px-3 py-2">
                ← Kembali ke Website
            </a>
        </div>
    </aside>

    <!-- Konten utama -->
    <main class="flex-1 min-w-0 p-6 md:p-10">

        <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
            <div>
                <p class="text-orange-700 font-semibold">Konten Website</p>
                <h2 class="text-3xl font-bold mt-1">Kelola Blog</h2>
                <p class="text-stone-500 mt-2">
                    Buat dan kelola artikel Warung Dhika.
                </p>
            </div>

            <a href="{{ route('admin.blog.create') }}"
               class="bg-orange-700 text-white px-5 py-3 rounded-xl hover:bg-orange-800">
                + Tambah Artikel
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-50 text-red-700 border border-red-200">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden shadow-sm">

            <div class="p-5 border-b border-stone-100">
                <h3 class="font-bold text-lg">Daftar Artikel</h3>
                <p class="text-sm text-stone-500 mt-1">
                    Total {{ $posts->count() }} artikel.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-stone-50 text-stone-500 text-sm">
                        <tr>
                            <th class="px-5 py-4">Artikel</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4">Tanggal</th>
                            <th class="px-5 py-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-stone-100">
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3 min-w-56">
                                        @if ($post->gambar)
                                            <img
                                                src="{{ asset('storage/' . $post->gambar) }}"
                                                alt="{{ $post->judul }}"
                                                class="w-16 h-16 object-cover rounded-lg"
                                            >
                                        @else
                                            <div class="w-16 h-16 bg-orange-50 rounded-lg flex items-center justify-center text-xl">
                                                📝
                                            </div>
                                        @endif

                                        <div>
                                            <p class="font-semibold">
                                                {{ $post->judul }}
                                            </p>
                                            <p class="text-sm text-stone-500 mt-1">
                                                {{ Str::limit($post->ringkasan, 60) }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-5 py-4">
                                    @if ($post->diterbitkan)
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                            Terbit
                                        </span>
                                    @else
                                        <span class="bg-stone-100 text-stone-600 px-3 py-1 rounded-full text-xs">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td class="px-5 py-4 text-sm text-stone-500 whitespace-nowrap">
                                    {{ $post->created_at->format('d-m-Y') }}
                                </td>

                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.blog.edit', $post) }}"
                                           class="text-orange-700 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.blog.destroy', $post) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="text-red-600 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-12 text-center">
                                    <p class="text-stone-500">
                                        Belum ada artikel blog.
                                    </p>

                                    <a href="{{ route('admin.blog.create') }}"
                                       class="inline-block mt-3 text-orange-700 font-semibold hover:underline">
                                        Buat artikel pertama →
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        <footer class="text-center text-sm text-stone-400 mt-8">
            © {{ date('Y') }} Warung Dhika · Admin Dashboard
        </footer>

    </main>
</div>

</body>
</html>
