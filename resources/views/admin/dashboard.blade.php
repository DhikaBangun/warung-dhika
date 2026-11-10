
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
               class="block bg-orange-50 text-orange-700 rounded-xl px-4 py-3 font-medium">
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
            <h2 class="text-xl font-bold text-stone-900">Dashboard</h2>
            
        
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
                <h3 class="text-2xl font-bold">Selamat Datang, Admin!</h3>
                <p class="text-stone-500 text-sm mt-2">
                    Pantau menu Warung Dhika dari satu halaman.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Total Menu</p>
                    <p class="text-3xl font-bold mt-2">{{ $totalMenu }}</p>
                    <a href="{{ route('admin.menu') }}"
                       class="text-sm text-orange-700 mt-3 inline-block hover:underline">
                        Kelola menu →
                    </a>
                </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Menu Tersedia</p>
                    <p class="text-3xl font-bold text-green-700 mt-2">
                        {{ $jumlahTersedia }}
                    </p>
                </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Menu Habis</p>
                    <p class="text-3xl font-bold text-red-600 mt-2">
                        {{ $jumlahHabis }}
                    </p>
                </div>

                <div class="bg-white border border-stone-200 rounded-xl p-5">
                    <p class="text-sm text-stone-500">Total Pengguna</p>

                    <p class="text-3xl font-bold mt-2">
                    {{ $totalPengguna }}
                </p>

                <p class="text-sm text-stone-500 mt-3">
                Akun terdaftar
                </p>
            </div>
        </div>

        <div class="mt-8 mb-4">
    <h3 class="text-xl font-bold">Statistik Pesanan</h3>
    <p class="text-sm text-stone-500 mt-1">
        Pantau jumlah pesanan dan pendapatan Warung Dhika.
    </p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
<div class="bg-white border border-stone-200 rounded-xl p-5">
    <p class="text-sm text-stone-500">Total Pesanan</p>
    <p class="text-3xl font-bold mt-2">{{ $totalPesanan }}</p>
    <a href="{{ route('admin.pesanan') }}"
       class="text-sm text-orange-700 mt-3 inline-block hover:underline">
        Lihat pesanan →
    </a>
</div>

<div class="bg-white border border-stone-200 rounded-xl p-5">
    <p class="text-sm text-stone-500">Pesanan Menunggu</p>
    <p class="text-3xl font-bold text-amber-600 mt-2">
        {{ $pesananMenunggu }}
    </p>
</div>

<div class="bg-white border border-stone-200 rounded-xl p-5">
    <p class="text-sm text-stone-500">Total Pendapatan</p>
    <p class="text-2xl font-bold text-green-700 mt-2">
        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
    </p>
    <p class="text-sm text-stone-500 mt-3">
        Dari pesanan berstatus Selesai
    </p>
</div>
</div>

            </div>


            <div class="bg-white border border-stone-200 rounded-2xl mt-7 p-5 md:p-6">
                <h3 class="text-lg font-bold">Ringkasan Kategori</h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-5">
                    <div class="bg-orange-50 rounded-xl p-4">
                        <p class="text-sm text-stone-600">Makanan Utama</p>
                        <p class="text-2xl font-bold mt-2">{{ $jumlahUtama }}</p>
                    </div>

                    <div class="bg-orange-50 rounded-xl p-4">
                        <p class="text-sm text-stone-600">Makanan Ringan</p>
                        <p class="text-2xl font-bold mt-2">{{ $jumlahRingan }}</p>
                    </div>

                    <div class="bg-orange-50 rounded-xl p-4">
                        <p class="text-sm text-stone-600">Minuman</p>
                        <p class="text-2xl font-bold mt-2">{{ $jumlahMinuman }}</p>
                    </div>
                </div>
                <div class="bg-white border border-stone-200 rounded-2xl mt-7 p-5 md:p-6">
    <h3 class="text-lg font-bold">Grafik Kategori Menu</h3>

    <p class="text-sm text-stone-500 mt-1">
        Perbandingan jumlah menu berdasarkan kategori.
    </p>

    <div class="mt-5">
        <canvas id="grafikMenu"></canvas>
    </div>
</div>
            </div>

            <div class="bg-white border border-stone-200 rounded-2xl mt-7 p-5 md:p-6">
                <h3 class="text-lg font-bold">Akses Cepat</h3>
                <p class="text-sm text-stone-500 mt-1">
                    Pilih halaman yang ingin kamu kelola.
                </p>

                <div class="flex flex-wrap gap-3 mt-5">
                    <a href="{{ route('admin.menu.create') }}"
                       class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-3 rounded-lg text-sm">
                        + Tambah Menu
                    </a>

                    <a href="{{ route('admin.menu') }}"
                       class="border border-stone-300 hover:bg-stone-50 px-4 py-3 rounded-lg text-sm">
                        Lihat Semua Menu
                    </a>

                    <a href="{{ route('admin.pesanan') }}"
                       class="border border-stone-300 hover:bg-stone-50 px-4 py-3 rounded-lg text-sm">
                        Lihat Pesanan
                    </a>
                </div>
                
            </div>

            <footer class="text-center text-sm text-stone-400 mt-8">
                © 2026 Warung Dhika · Admin Dashboard
            </footer>

        </div>
    </main>
</div>
<script>
    const grafikMenu = document.getElementById('grafikMenu');

    new Chart(grafikMenu, {
        type: 'bar',

        data: {
            labels: [
                'Makanan Utama',
                'Makanan Ringan',
                'Minuman'
            ],

            datasets: [{
                label: 'Jumlah Menu',

                data: [
                    {{ $jumlahUtama }},
                    {{ $jumlahRingan }},
                    {{ $jumlahMinuman }}
                ],

                backgroundColor: [
                    '#ea580c',
                    '#fb923c',
                    '#fdba74'
                ],

                borderRadius: 8
            }]
        },

        options: {
            responsive: true,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
</body>
</html>
