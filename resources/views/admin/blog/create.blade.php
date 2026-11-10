
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-100 min-h-screen text-stone-800">

    <nav class="bg-white border-b px-6 py-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-orange-600">
                Warung Dhika
            </h1>
            <a href="{{ route('admin.blog.index') }}"
               class="text-sm text-stone-600 hover:text-orange-600">
                ← Kembali
            </a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-2">Tambah Artikel</h2>
        <p class="text-stone-500 mb-6">
            Buat artikel baru untuk website Warung Dhika.
        </p>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">
                <p class="font-bold">Ada kesalahan:</p>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.blog.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="bg-white p-6 rounded-xl shadow-sm space-y-5">

            @csrf

            <div>
                <label for="judul" class="block font-medium mb-2">
                    Judul Artikel
                </label>
                <input type="text" id="judul" name="judul"
                       value="{{ old('judul') }}"
                       required
                       class="w-full border rounded-lg px-4 py-3">
            </div>

            <div>
                <label for="ringkasan" class="block font-medium mb-2">
                    Ringkasan
                </label>
                <textarea id="ringkasan" name="ringkasan" rows="3"
                          class="w-full border rounded-lg px-4 py-3">{{ old('ringkasan') }}</textarea>
            </div>

            <div>
                <label for="isi" class="block font-medium mb-2">
                    Isi Artikel
                </label>
                <textarea id="isi" name="isi" rows="10" required
                          class="w-full border rounded-lg px-4 py-3">{{ old('isi') }}</textarea>
            </div>

            <div>
                <label for="gambar" class="block font-medium mb-2">
                    Gambar Artikel
                </label>
                <input type="file" id="gambar" name="gambar"
                       accept=".jpg,.jpeg,.png,.webp"
                       class="w-full border rounded-lg p-3">
                <p class="text-sm text-stone-500 mt-1">
                    JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </p>
            </div>

            <div>
                <label for="diterbitkan" class="block font-medium mb-2">
                    Status Artikel
                </label>
                <select id="diterbitkan" name="diterbitkan" required
                        class="w-full border rounded-lg px-4 py-3 bg-white">
                    <option value="0">Draft — Belum dipublikasikan</option>
                    <option value="1">Terbit — Tampilkan ke publik</option>
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg">
                    Simpan Artikel
                </button>

                <a href="{{ route('admin.blog.index') }}"
                   class="border px-6 py-3 rounded-lg hover:bg-stone-100">
                    Batal
                </a>
            </div>
        </form>
    </main>

</body>
</html>
