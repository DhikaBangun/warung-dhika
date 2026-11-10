
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu - Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 min-h-screen p-6">

    <div class="max-w-xl mx-auto">
        <a href="{{ route('admin.menu') }}"
           class="text-orange-700 hover:underline">
            &larr; Kembali ke Kelola Menu
        </a>

        <div class="bg-white rounded-2xl shadow-sm border
                    border-stone-200 p-6 mt-5">

            <h1 class="text-2xl font-bold text-stone-800">
                Edit Menu
            </h1>

            <p class="text-stone-500 mt-1 mb-6">
                Ubah informasi menu di bawah ini.
            </p>

            @if ($errors->any())
                <div class="bg-red-50 text-red-700 p-3 rounded-lg mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.menu.update', $menu->id) }}"
                method="POST"
                enctype="multipart/form-data">
             @csrf
             @method('PUT')
                <!-- Nama menu -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Nama Menu
                    </label>
                    <input type="text" name="nama"
                           value="{{ old('nama', $menu->nama) }}"
                           required maxlength="100"
                           class="w-full border border-stone-300 rounded-lg
                                  px-4 py-3 focus:outline-none
                                  focus:ring-2 focus:ring-orange-400">
                </div>
                <!-- deskripsi -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Deskripsi
                    </label>
                    <textarea name="deskripsi" rows="3"
                              class="w-full border border-stone-300 rounded-lg
                                     px-4 py-3 focus:outline-none
                                     focus:ring-2 focus:ring-orange-400">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                </div>
            <!-- harga -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">
                        Harga (Rp)
                    </label>
                    <input type="number" name="harga"
                           value="{{ old('harga', $menu->harga) }}"
                           required min="0" step="0.01"
                           class="w-full border border-stone-300 rounded-lg
                                  px-4 py-3 focus:outline-none
                                  focus:ring-2 focus:ring-orange-400">
                </div>

                <div class="mb-4">
    <!-- kategori -->
    <label for="kategori" class="block mb-2 text-sm font-medium">
        Kategori
    </label>

    <select
        name="kategori"
        id="kategori"
        required
        class="w-full border rounded-lg p-2"
    >
    
        <option value="">Pilih Kategori</option>

        <option value="Makanan Utama"
            @selected(old('kategori', $menu->kategori) === 'Makanan Utama')>
            Makanan Utama
        </option>

        <option value="Makanan Ringan"
            @selected(old('kategori', $menu->kategori) === 'Makanan Ringan')>
            Makanan Ringan
        </option>

        <option value="Minuman"
            @selected(old('kategori', $menu->kategori) === 'Minuman')>
            Minuman
        </option>
    </select>

    @error('kategori')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

        
<div class="mb-4">
    <label for="tersedia" class="block mb-2 text-sm font-medium">
        Ketersediaan Menu
    </label>

    <select
        name="tersedia"
        id="tersedia"
        required
        class="w-full border rounded-lg p-2"
    >
        <option value="Tersedia"
            @selected(old('tersedia', $menu->tersedia) === 'Tersedia')>
            Tersedia
        </option>

        <option value="Habis"
            @selected(old('tersedia', $menu->tersedia) === 'Habis')>
            Habis
        </option>
    </select>

    @error('tersedia')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>


<!-- ganti gambar -->
        <div class="mb-4">
            <label for="gambar" class="block mb-2 text-sm font-medium">
             Ganti Gambar Menu (opsional)
            </label>

            @if ($menu->gambar)
                <img
                src="{{ asset('storage/' . $menu->gambar) }}"
                alt="Gambar {{ $menu->nama }}"
                class="w-32 h-32 object-cover rounded mb-3"
             >
            @endif

            <input
               type="file"
              name="gambar"
              id="gambar"
              accept=".jpg,.jpeg,.png,.webp"
             class="w-full border rounded p-2"
            >

            <p class="text-sm text-gray-500 mt-1">
                Format JPG, PNG, atau WebP. Maksimal 2 MB.
            </p>

            @error('gambar')
                 <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
        </div>

                <button type="submit"
                        class="w-full bg-orange-600 hover:bg-orange-700
                               text-white font-semibold rounded-lg py-3">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

</body>
</html>
