
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Warung Dhika</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-stone-50 flex items-center justify-center px-4 py-10">

    <main class="w-full max-w-md">

        <!-- Logo dan nama warung -->
        <div class="text-center mb-8">
           <a href="{{ route('home') }}"
               class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-orange-700 text-white mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.8"
                     stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 11h18M5 11l1 9h12l1-9M8 11V5m4 6V3m4 8V5"/>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-stone-900">
                Warung Dhika
            </h1>
            <p class="text-sm text-stone-500 mt-2">
                Masuk untuk melanjutkan
            </p>
        </div>

        <!-- Kartu login -->
        <div class="bg-white border border-stone-200 rounded-2xl p-7 sm:p-8 shadow-sm">
            <h2 class="text-xl font-semibold text-stone-900">
                Selamat datang kembali!
            </h2>
            <p class="text-sm text-stone-500 mt-2 mb-7">
                Masukkan akun kamu untuk masuk.
            </p>
               
            @if ($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    <p>Email atau password salah.</p>
                </div>
            @endif


            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email"
                           class="block text-sm font-medium text-stone-700 mb-2">
                        Email
                    </label>
                    <input type="email" id="email" name="email"
                           placeholder="nama@email.com" required
                           class="w-full rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-100">
                </div>

                <div class="mb-5">
                    <label for="password"
                           class="block text-sm font-medium text-stone-700 mb-2">
                        Password
                    </label>
                    <input type="password" id="password" name="password"
                           placeholder="Masukkan password" required
                           class="w-full rounded-xl border border-stone-300 px-4 py-3 text-sm outline-none focus:border-orange-600 focus:ring-2 focus:ring-orange-100">
                </div>

                <button type="submit"
                        class="w-full bg-orange-700 hover:bg-orange-800 text-white font-medium py-3 rounded-xl transition">
                    Masuk
                </button>
            </form>

            <p class="text-sm text-center text-stone-600 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}"
                   class="font-semibold text-orange-700 hover:text-orange-800">
                    Daftar sekarang
                </a>
            </p>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}"
               class="text-sm text-stone-500 hover:text-orange-700">
                ← Kembali ke beranda
            </a>
        </div>

        <p class="text-xs text-stone-400 text-center mt-8">
            © 2026 Warung Dhika
        </p>
    </main>

</body>
</html>