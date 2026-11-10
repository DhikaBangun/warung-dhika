
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-100 min-h-screen text-stone-800">

    <nav class="bg-white border-b px-6 py-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-orange-600">
                Warung Dhika
            </h1>

            <a href="{{ route('admin.menu') }}"
               class="text-sm text-stone-600 hover:text-orange-600">
                ← Kembali ke Menu
            </a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-2">Tambah Menu</h2>
        <p class="text-stone-500 mb-6">
            Tambahkan menu makanan atau minuman baru.
        </p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.menu.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="bg-white p-6 rounded-xl shadow-sm space-y-5">

            @csrf

            <div>
                <label for="nama" class="block font-medium mb-2">
                    Nama Menu
                </label>
                <input type="text" id="nama" name="nama"
                       value="{{ old('nama') }}" required
                       class="w-full border rounded-lg px-4 py-3">
            </div>

            <div>
                <label for="kategori" class="block font-medium mb-2">
                    Kategori
                </label>
                <input type="text" id="kategori" name="kategori"
                       value="{{ old('kategori') }}" required
                       class="w-full border rounded-lg px-4 py-3"
                       placeholder="Contoh: Makanan atau Minuman">
            </div>

            <div>
                <label for="deskripsi" class="block font-medium mb-2">
                    Deskripsi
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="4"
                          class="w-full border rounded-lg px-4 py-3">{{ old('deskripsi') }}</textarea>
            </div>

            <div>
                <label for="harga" class="block font-medium mb-2">
                    Harga
                </label>
                <input type="number" id="harga" name="harga"
                       value="{{ old('harga') }}" min="0" required
                       class="w-full border rounded-lg px-4 py-3">
            </div>

            <div>
                <label for="gambar" class="block font-medium mb-2">
                    Gambar Menu
                </label>
                <input type="file" id="gambar" name="gambar"
                       accept=".jpg,.jpeg,.png,.webp"
                       class="w-full border rounded-lg p-3">
            </div>

            
<div>
    <label for="tersedia" class="block font-medium mb-2">
        Ketersediaan
    </label>

    <select id="tersedia" name="tersedia" required
            class="w-full border rounded-lg px-4 py-3 bg-white">
        <option value="Tersedia"
            {{ old('tersedia', 'Tersedia') == 'Tersedia' ? 'selected' : '' }}>
            Tersedia
        </option>

        <option value="Habis"
            {{ old('tersedia') == 'Habis' ? 'selected' : '' }}>
            Tidak tersedia
        </option>
    </select>
</div>


            <div class="flex gap-3">
                <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg">
                    Simpan Menu
                </button>

                <a href="{{ route('admin.menu') }}"
                   class="border px-6 py-3 rounded-lg hover:bg-stone-100">
                    Batal
                </a>
            </div>
        </form>
    </main>

</body>
</html>

