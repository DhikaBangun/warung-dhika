
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800">

<div class="min-h-screen flex">

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
               class="block bg-orange-50 text-orange-700 rounded-xl px-4 py-3 font-medium">
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

    <main class="flex-1 min-w-0">
        <header class="bg-white border-b border-stone-200 px-5 md:px-8 py-5">
            <p class="text-sm text-stone-500">Halaman Admin</p>
            <h2 class="text-xl font-bold text-stone-900">Pesanan Pelanggan</h2>
            
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

            <div class="mb-7">
                <h3 class="text-2xl font-bold">Daftar Pesanan</h3>
                <p class="text-stone-500 text-sm mt-2">
                    Pantau dan kelola pesanan pelanggan Warung Dhika.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-7">
                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Total Pesanan</p>
                    <p class="text-2xl font-bold mt-2">{{ $totalPesanan }}</p>
                </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Diproses</p>
                    <p class="text-2xl font-bold text-orange-600 mt-2">{{ $pesananDiproses }}</p>
                </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Selesai</p>
                    <p class="text-2xl font-bold text-green-700 mt-2">{{ $pesananSelesai }}</p>
                </div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl overflow-hidden">
                <div class="p-5 border-b border-stone-100">
                    <h3 class="font-bold text-lg">Semua Pesanan</h3>
                    <p class="text-sm text-stone-500 mt-1">
                        Pesanan pelanggan akan ditampilkan di sini.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-stone-50 text-stone-500">
                            <tr>
                                <th class="px-5 py-4 font-medium">No.</th>
                                <th class="px-5 py-4 font-medium">Pelanggan</th>
                                <th class="px-5 py-4 font-medium">Tanggal</th>
                                <th class="px-5 py-4 font-medium">Total</th>
                                <th class="px-5 py-4 font-medium">Status</th>
                                <th class="px-5 py-4 font-medium">Detail menu</th>
                            </tr>
                        </thead>
                        
<tbody>
    @forelse ($pesanans as $pesanan)
        <tr class="border-t border-stone-100">
            <td class="px-5 py-4">
                #{{ $pesanan->id }}
            </td>

            <td class="px-5 py-4">
                {{ $pesanan->nama_pelanggan }}
            </td>

            <td class="px-5 py-4">
                {{ $pesanan->created_at->format('d-m-Y H:i') }}
            </td>

            <td class="px-5 py-4">
                Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}
            </td>

            <td class="px-5 py-4">
                <form
        action="{{ route('admin.pesanan.status', $pesanan->id) }}"
        method="POST"
        class="flex flex-col gap-2"
    >
        @csrf
        @method('PATCH')

        <select
            name="status"
            class="border border-stone-300 rounded-lg px-3 py-2 text-sm"
        >
            @foreach (['Menunggu', 'Diproses', 'Selesai', 'Dibatalkan'] as $status)
                <option
                    value="{{ $status }}"
                    @selected($pesanan->status === $status)
                >
                    {{ $status }}
                </option>
            @endforeach
        </select>

        <button
            type="submit"
            class="bg-orange-700 text-white rounded-lg px-3 py-2 text-sm hover:bg-orange-800"
        >
            Simpan Status
        </button>
    </form>
            </td>

            <td class="px-5 py-4">
                @forelse ($pesanan->detailPesanans as $detail)
                    <div class="mb-1">
                        {{ $detail->menu->nama ?? 'Menu dihapus' }}
                        × {{ $detail->jumlah }}
                    </div>
                @empty
                    <span class="text-stone-400">Belum ada detail menu</span>
                @endforelse
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6"
                class="px-5 py-12 text-center text-stone-500">
                <p class="font-medium text-stone-700">
                    Belum ada data pesanan
                </p>
                <p class="text-sm mt-2">
                    Data akan muncul setelah        pelanggan membuat pesanan.
                        </p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>    

                    </table>
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
