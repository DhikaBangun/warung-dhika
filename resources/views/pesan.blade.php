
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan | Warung Dhika</title>
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

<main class="max-w-3xl mx-auto px-6 py-12">
    <p class="text-orange-700 font-semibold">Pesan makanan favoritmu</p>
    <h1 class="text-3xl font-bold mt-2">Formulir Pemesanan</h1>
    <p class="text-stone-600 mt-3 mb-8">
        Isi informasi di bawah ini. Setelah itu, klik tombol "Kirim Pesanan" untuk mengirimkan pesananmu ke Warung Dhika. Kamu akan diarahkan ke halaman konfirmasi setelah pesanan berhasil dikirim.
    </p>

    <div class="bg-white border border-stone-200 rounded-2xl p-6 md:p-8">
        <form id="order-form" action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="nama" class="block font-medium mb-2">Nama pelanggan</label>
                <input id="nama" name="nama" type="text" placeholder="Masukkan nama kamu"
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 focus:outline-none focus:border-orange-700" required>
            </div>

            <div class="mb-5">
                <p class="block font-medium mb-2">Daftar menu pesanan</p>
                <div id="menu-items" class="space-y-4">
                    <div class="menu-item grid gap-3 sm:grid-cols-[1fr_120px_auto] sm:items-end">
                        <div>
                            <label for="menu-1" class="block font-medium mb-2">Pilih menu</label>
                            <select id="menu-1" name="menu[]" data-menu-select required
                                class="w-full border border-stone-300 rounded-lg px-4 py-3 bg-white">
                                <option value="" disabled selected>Pilih menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">
                                {{ $menu->nama }} - Rp{{ number_format($menu->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                        <div>
                            <label for="jumlah-1" class="block font-medium mb-2">Jumlah</label>
                            <input id="jumlah-1" name="jumlah[]" type="number" min="1" value="1" required
                                class="w-full border border-stone-300 rounded-lg px-4 py-3">
                        </div>
                        <button type="button" data-remove-menu
                            class="border border-red-300 text-red-700 px-4 py-3 rounded-lg hover:bg-red-50 disabled:opacity-50 disabled:cursor-not-allowed">
                            Hapus
                        </button>
                    </div>
                </div>
                <button id="add-menu" type="button"
                    class="mt-4 border border-orange-700 text-orange-700 px-4 py-2 rounded-lg font-medium hover:bg-orange-50">
                    + Tambah menu
                </button>
            </div>

            <div class="mb-5">
                <label for="tipe" class="block font-medium mb-2">Jenis pesanan</label>
                <select id="tipe" name="tipe" required
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 bg-white">
                    <option value="dine-in">Makan di tempat</option>
                    <option value="takeaway">Bawa pulang</option>
                    <option value="delivery">Antar ke alamat</option>
                </select>
            </div>

            <div id="alamat-container" class="mb-5" hidden>
                <label for="alamat" class="block font-medium mb-2">Alamat (jika diantar)</label>
                <textarea id="alamat" name="alamat" rows="3"
                    placeholder="Masukkan alamat pengantaran jika diperlukan"
                    class="w-full border border-stone-300 rounded-lg px-4 py-3"></textarea>
            </div>

            <div class="mb-6">
                <label for="catatan" class="block font-medium mb-2">Catatan tambahan</label>
                <textarea id="catatan" name="catatan" rows="3"
                    placeholder="Contoh: tidak pedas, sambal dipisah"
                    class="w-full border border-stone-300 rounded-lg px-4 py-3"></textarea>
            </div>

            <button type="submit"
                class="block w-full text-center bg-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-800">
                Kirim Pesanan
            </button>
        </form>
    </div>
</main>

<footer class="bg-stone-900 text-stone-300 text-center px-6 py-6">
    <p>© 2026 Warung Dhika.</p>
</footer>

<script>
    const orderForm = document.getElementById('order-form');
    const orderType = document.getElementById('tipe');
    const addressContainer = document.getElementById('alamat-container');
    const addressField = document.getElementById('alamat');
    const menuItems = document.getElementById('menu-items');
    const addMenuButton = document.getElementById('add-menu');
    let menuItemCount = 1;

    function updateAddressField() {
        const requiresAddress = orderType.value === 'delivery';

        addressContainer.hidden = !requiresAddress;
        addressField.required = requiresAddress;
    }

    orderType.addEventListener('change', updateAddressField);
    updateAddressField();

    function updateRemoveButtons() {
        const removeButtons = menuItems.querySelectorAll('[data-remove-menu]');
        removeButtons.forEach((button) => {
            button.disabled = removeButtons.length === 1;
        });
    }

    addMenuButton.addEventListener('click', () => {
        menuItemCount += 1;

        const newMenuItem = menuItems.querySelector('.menu-item').cloneNode(true);
        const menuSelect = newMenuItem.querySelector('[data-menu-select]');
        const quantityInput = newMenuItem.querySelector('input[name="jumlah[]"]');
        const menuLabel = newMenuItem.querySelector('label[for^="menu-"]');
        const quantityLabel = newMenuItem.querySelector('label[for^="jumlah-"]');

        menuSelect.id = `menu-${menuItemCount}`;
        menuSelect.value = '';
        menuLabel.htmlFor = menuSelect.id;
        quantityInput.id = `jumlah-${menuItemCount}`;
        quantityInput.value = '1';
        quantityLabel.htmlFor = quantityInput.id;

        menuItems.appendChild(newMenuItem);
        updateRemoveButtons();
    });

    menuItems.addEventListener('click', (event) => {
        const removeButton = event.target.closest('[data-remove-menu]');

        if (removeButton && menuItems.querySelectorAll('.menu-item').length > 1) {
            removeButton.closest('.menu-item').remove();
            updateRemoveButtons();
        }
    });

    
orderForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // Periksa apakah semua pilihan menu sudah diisi
    const menuSelects = menuItems.querySelectorAll('[data-menu-select]');

    for (const select of menuSelects) {
        if (!select.value) {
            alert('Silakan pilih semua menu terlebih dahulu.');
            select.focus();
            return;
        }
    }

    // Kirim formulir ke Laravel
    orderForm.submit();
});

</script>

</body>
</html>
