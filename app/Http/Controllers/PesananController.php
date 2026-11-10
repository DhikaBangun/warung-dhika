<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function simpan(Request $request)
    {
        // Validasi data formulir
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:dine-in,takeaway,delivery',
            'alamat' => 'nullable|string',
            'catatan' => 'nullable|string',
            'menu' => 'required|array|min:1',
            'menu.*' => 'required|integer|distinct',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        // Pastikan jumlah sesuai dengan menu yang dipilih
        if (count($data['menu']) !== count($data['jumlah'])) {
            return back()->withInput()->withErrors([
                'menu' => 'Jumlah menu dan jumlah pesanan tidak sesuai.',
            ]);
        }

        // Ambil menu yang tersedia dari database
        $menus = Menu::whereIn('id', $data['menu'])
            ->where('tersedia', 'Tersedia')
            ->get();

        // Pastikan semua menu tersedia
        if ($menus->count() !== count($data['menu'])) {
            return back()->withInput()->withErrors([
                'menu' => 'Ada menu yang tidak tersedia. Silakan pilih menu lain.',
            ]);
        }

        // Simpan pesanan dan detailnya dalam satu transaksi
        $pesanan = DB::transaction(function () use ($data, $menus) {
            $totalHarga = 0;

            foreach ($data['menu'] as $index => $menuId) {
                $menu = $menus->firstWhere('id', $menuId);

                $totalHarga += $menu->harga * $data['jumlah'][$index];
            }

            // Simpan pesanan utama
            $pesanan = Pesanan::create([
                'nama_pelanggan' => $data['nama'],
                'tipe' => $data['tipe'],
                'alamat' => $data['alamat'] ?? null,
                'catatan' => $data['catatan'] ?? null,
                'total_harga' => $totalHarga,
                'status' => 'Menunggu',
            ]);

            // Simpan setiap menu yang dipesan
            foreach ($data['menu'] as $index => $menuId) {
                $menu = $menus->firstWhere('id', $menuId);

                $pesanan->detailPesanans()->create([
                    'menu_id' => $menu->id,
                    'jumlah' => $data['jumlah'][$index],
                    'harga' => $menu->harga,
                ]);
            }

            return $pesanan;
        });

        // Arahkan pelanggan ke halaman konfirmasi
        return redirect()->route('pesanan.terkirim')
            ->with('pesanan_id', $pesanan->id);
    }
}
