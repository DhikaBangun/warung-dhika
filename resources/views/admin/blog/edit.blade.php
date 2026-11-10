<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-stone-100 min-h-screen text-stone-800">

    <!-- {{-- NAVBAR --}} -->
    <nav class="bg-white border-b border-stone-200 px-6 py-4">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-orange-600">
                Warung Dhika
            </h1>

            <a href="{{ route('admin.blog.index') }}"
               class="text-sm text-stone-600 hover:text-orange-600">
                ← Kembali ke Blog
            </a>
        </div>
    </nav>

    <!-- {{-- KONTEN --}} -->
    <main class="max-w-4xl mx-auto px-4 py-8">

        <div class="mb-6">
            <h2 class="text-2xl font-bold">Edit Artikel</h2>
            <p class="text-stone-500 mt-1">
                Perbarui informasi artikel Warung Dhika.
            </p>
        </div>

        <!-- {{-- PESAN ERROR --}} -->
        @if ($errors->any())
            <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-5">
                <p class="font-semibold mb-2">
                    Ada data yang perlu diperbaiki:
                </p>

                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- {{-- FORM EDIT --}} -->
        <form action="{{ route('admin.blog.update', $post) }}"
              method="POST"
              enctype="multipart/form-data"
              class="bg-white p-6 md:p-8 rounded-xl shadow-sm space-y-5">

            @csrf
            @method('PUT')

            <!-- {{-- JUDUL --}} -->
            <div>
                <label for="judul" class="block font-medium mb-2">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul', $post->judul) }}"
                    required
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    placeholder="Masukkan judul artikel"
                >
            </div>

            <!-- {{-- RINGKASAN --}}  -->
            <div>
                <label for="ringkasan" class="block font-medium mb-2">
                    Ringkasan Artikel
                </label>

                <textarea
                    id="ringkasan"
                    name="ringkasan"
                    rows="3"
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    placeholder="Deskripsi singkat artikel..."
                >{{ old('ringkasan', $post->ringkasan) }}</textarea>
            </div>

            <!-- {{-- ISI ARTIKEL --}} -->
            <div>
                <label for="isi" class="block font-medium mb-2">
                    Isi Artikel
                </label>

                <textarea
                    id="isi"
                    name="isi"
                    rows="10"
                    required
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-400"
                    placeholder="Tulis isi artikel di sini..."
                >{{ old('isi', $post->isi) }}</textarea>
            </div>

            <!-- {{-- GAMBAR LAMA --}} -->
            @if ($post->gambar)
                <div>
                    <p class="font-medium mb-2">Gambar Saat Ini</p>

                    <img
                        src="{{ asset('storage/' . $post->gambar) }}"
                        alt="{{ $post->judul }}"
                        class="w-full max-w-sm max-h-64 object-cover rounded-lg border border-stone-200"
                    >

                    <p class="text-xs text-stone-500 mt-2">
                        Pilih gambar baru di bawah jika ingin menggantinya.
                        Kosongkan jika ingin tetap menggunakan gambar ini.
                    </p>
                </div>
            @endif

            <!-- {{-- GANTI GAMBAR --}} -->
            <div>
                <label for="gambar" class="block font-medium mb-2">
                    {{ $post->gambar ? 'Ganti Gambar Artikel' : 'Gambar Artikel' }}
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="w-full border border-stone-300 rounded-lg p-3"
                >

                <p class="text-xs text-stone-500 mt-2">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </p>
            </div>

            <!-- {{-- STATUS --}} -->
            <div>
                <label for="diterbitkan" class="block font-medium mb-2">
                    Status Artikel
                </label>

                <select
                    id="diterbitkan"
                    name="diterbitkan"
                    required
                    class="w-full border border-stone-300 rounded-lg px-4 py-3 bg-white"
                >
                    <option value="0"
                        {{ (string) old('diterbitkan', (int) $post->diterbitkan) === '0' ? 'selected' : '' }}>
                        Draft — Belum ditampilkan ke publik
                    </option>

                    <option value="1"
                        {{ (string) old('diterbitkan', (int) $post->diterbitkan) === '1' ? 'selected' : '' }}>
                        Terbit — Siap ditampilkan ke publik
                    </option>
                </select>
            </div>

            <!-- {{-- TOMBOL --}} -->
            <div class="flex flex-col sm:flex-row gap-3 pt-3">
                <button
                    type="submit"
                    class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-6 py-3 rounded-lg transition"
                >
                    Perbarui Artikel
                </button>

                <a
                    href="{{ route('admin.blog.index') }}"
                    class="text-center border border-stone-300 hover:bg-stone-100 px-6 py-3 rounded-lg transition"
                >
                    Batal
                </a>
            </div>

        </form>
    </main>

    <footer class="text-center text-sm text-stone-500 py-6">
        &copy; {{ date('Y') }} Warung Dhika
    </footer>

</body>
</html>