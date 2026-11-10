
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Menu | Warung Dhika</title>
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
               class="block bg-orange-50 text-orange-700 rounded-xl px-4 py-3 font-medium">
                Kelola Menu
            </a>

            <a href="{{ route('admin.pesanan') }}"
               class="block text-stone-600 hover:bg-stone-100 rounded-xl px-4 py-3">
                Pesanan
            </a>
            <a href="{{ route('admin.blog.index') }}"
               class="block text-stone-600 hover:bg-stone-100 rounded-xl px-4 py-3">
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
    

@if (session('success'))
    <div
        id="success-alert"
        class="fixed top-5 right-5 z-50 w-80 max-w-[calc(100vw-2rem)] rounded-xl border border-orange-200 bg-white p-4 shadow-lg"
        role="alert"
    >
        <div class="flex items-start gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-orange-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     viewBox="0 0 20 20"
                     fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M16.704 5.29a1 1 0 0 1 .006 1.414l-7.1 7.1a1 1 0 0 1-1.414 0l-3.4-3.4A1 1 0 0 1 6.21 8.99l2.693 2.693 6.393-6.393a1 1 0 0 1 1.408 0Z"
                          clip-rule="evenodd" />
                </svg>
            </div>

            <div class="min-w-0 flex-1">
                <p class="font-semibold text-gray-900">
                    Berhasil!
                </p>
                <p class="mt-1 text-sm text-gray-600">
                    {{ session('success') }}
                </p>
            </div>

            <button
                type="button"
                onclick="document.getElementById('success-alert').remove()"
                class="text-gray-400 hover:text-gray-700"
                aria-label="Tutup notifikasi"
            >
                &times;
            </button>
        </div>
    </div>
@endif


    <main class="flex-1 min-w-0">

        <header class="bg-white border-b border-stone-200 px-5 md:px-8 py-5">
            <p class="text-sm text-stone-500">Halaman Admin</p>
            <h2 class="text-xl font-bold text-stone-900">Kelola Menu</h2>
        
<div class="flex justify-end">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="mt-4 rounded-lg bg-orange-700 px-3 py-2 text-sm font-medium text-white hover:bg-orange-800">
            Logout
        </button>
    </form>
</div>

        
        </header>

        <div class="p-5 md:p-8">

            <!-- Judul dan tombol -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">
                <div>
                    <h3 class="text-2xl font-bold text-stone-900">
                        Daftar Menu
                    </h3>
                    <p class="text-stone-500 text-sm mt-2">
                        Daftar makanan dan minuman Warung Dhika.
                    </p>
                </div>

               <a href="{{ route('admin.menu.create') }}"
                     class="bg-orange-600 hover:bg-orange-700 text-white
                            px-4 py-2 rounded-lg">
                    + Tambah Menu
                </a>
            </div>

            <!-- Ringkasan -->
            
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7">

            <div class="bg-white border border-stone-200 rounded-xl p-5">
                <p class="text-sm text-stone-500">Makanan Utama</p>
                <p class="text-2xl font-bold mt-2">{{ $jumlahUtama }}</p>
            </div>

            <div class="bg-white border border-stone-200 rounded-xl p-5">
                <p class="text-sm text-stone-500">Makanan Ringan</p>
                <p class="text-2xl font-bold mt-2">{{ $jumlahRingan }}</p>
            </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                <p class="text-sm text-stone-500">Minuman</p>
                 <p class="text-2xl font-bold mt-2">{{ $jumlahMinuman }}</p>
                </div>

        </div>


            <!-- Tabel menu -->
            <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden">

                <div class="p-5 border-b border-stone-100">
                    <h3 class="font-bold text-lg">Semua Menu</h3>
                    <p class="text-sm text-stone-500 mt-1">
                        Data menu dari database Warung Dhika.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-stone-50 text-stone-500">
                            <tr>
                                <th class="px-5 py-4 font-medium">No.</th>
                                <th class="px-5 py-4 font-medium">Nama Menu</th>
                                <th class="px-5 py-4 font-medium">Kategori</th>
                                <th class="px-5 py-4 font-medium">Harga</th>
                                <th class="px-5 py-4 font-medium">Status</th>
                                <th class="px-5 py-4 font-medium">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-stone-100">
                            @forelse ($menus as $menu)
                                <tr>
                                    <td class="px-5 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-medium">
                                        {{ $menu->nama }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $menu->kategori ?? '-' }}
                                    </td>

                                    <td class="px-5 py-4">
                                        Rp{{ number_format($menu->harga, 0, ',', '.') }}
                                    </td>

                                    
                                    
                                    <td class="px-5 py-4">
                                    @if ($menu->tersedia === 'Tersedia')
                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                            Tersedia
                                        </span>
                                    @elseif ($menu->tersedia === 'Habis')
                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                            Habis
                                        </span>
                                    @else
                                        <span class="bg-stone-100 text-stone-600 px-3 py-1 rounded-full text-xs">
                                             Belum diatur
                                        </span>
                                    @endif
</td>

                                    <td class="px-5 py-4 whitespace-nowrap">
                                        <a href="{{ route('admin.menu.edit', $menu->id) }}"
                                            class="text-orange-700 font-medium mr-3 hover:underline">
                                            Edit
                                            </a>

                                            <form action="{{ route('admin.menu.destroy', $menu->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus menu ini?')">

                                                @csrf
                                                @method('DELETE')

                                            <button type="submit">
                                             Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="px-5 py-8 text-center text-stone-500">
                                        Belum ada menu di database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-5 border-t border-stone-100 text-sm text-stone-500">
                    Total {{ $menus->count() }} menu.
                </div>
            </div>

            <footer class="text-center text-sm text-stone-400 mt-8">
                © 2026 Warung Dhika · Admin Dashboard
            </footer>

        </div>
    </main>
</div>

</body>
</html>
