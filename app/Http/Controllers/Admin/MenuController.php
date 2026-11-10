<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    



    public function index()
    {
        $menus = Menu::all();

        $jumlahUtama = $menus->where('kategori', 'Makanan Utama')->count();
        $jumlahRingan = $menus->where('kategori', 'Makanan Ringan')->count();
        $jumlahMinuman = $menus->where('kategori', 'Minuman')->count();

        return view('admin.menu', compact(
            'menus',
            'jumlahUtama',
            'jumlahRingan',
            'jumlahMinuman'
        ));
    }

public function formPesanan()
{
    $menus = Menu::where('tersedia', 'Tersedia')
        ->orderBy('nama')
        ->get();

    return view('pesan', compact('menus'));
}

    public function create()
    {
        return view('admin.menu-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|in:Makanan Utama,Makanan Ringan,Minuman',
            'tersedia' => 'required|in:Tersedia,Habis',
        ]);

        Menu::create($data);

        return redirect()
            ->route('admin.menu')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('admin.menu-edit', compact('menu'));
    }

    
public function update(Request $request, $id)
{
    $menu = Menu::findOrFail($id);

    $data = $request->validate([
        'nama' => 'required|string|max:100',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric|min:0',
        'kategori' => 'required|in:Makanan Utama,Makanan Ringan,Minuman',
        'tersedia' => 'required|in:Tersedia,Habis',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Jika admin mengunggah gambar baru
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        // Simpan gambar baru
        $data['gambar'] = $request->file('gambar')
            ->store('menu', 'public');
    }

    $menu->update($data);

    return redirect()
        ->route('admin.menu')
        ->with('success', 'Menu berhasil diperbarui!');
}


    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        $menu->delete();

        return redirect()
            ->route('admin.menu')
            ->with('success', 'Menu berhasil dihapus!');
    }

    
    public function daftarMenu()
{
    $menus = Menu::where('tersedia', 'Tersedia')->get();

    return view('menu', compact('menus'));
}

public function dashboard()
{
    // Statistik pengguna
    $totalPengguna = User::count();

    // Statistik pesanan
    $totalPesanan = Pesanan::count();

    $pesananMenunggu = Pesanan::where(
        'status',
        'Menunggu'
    )->count();

    $totalPendapatan = Pesanan::where(
        'status',
        'Selesai'
    )->sum('total_harga');

    // Statistik menu
    $totalMenu = Menu::count();

    $jumlahTersedia = Menu::where(
        'tersedia',
        'Tersedia'
    )->count();

    $jumlahHabis = Menu::where(
        'tersedia',
        'Habis'
    )->count();

    // Statistik kategori
    $jumlahUtama = Menu::where(
        'kategori',
        'Makanan Utama'
    )->count();

    $jumlahRingan = Menu::where(
        'kategori',
        'Makanan Ringan'
    )->count();

    $jumlahMinuman = Menu::where(
        'kategori',
        'Minuman'
    )->count();

    return view('admin.dashboard', compact(
        'totalPengguna',
        'totalMenu',
        'jumlahTersedia',
        'jumlahHabis',
        'jumlahUtama',
        'jumlahRingan',
        'jumlahMinuman',
        'totalPesanan',
        'pesananMenunggu',
        'totalPendapatan',
    ));
}

public function updateStatus(Request $request, $id)
{
    $data = $request->validate([
        'status' => 'required|in:Menunggu,Diproses,Selesai,Dibatalkan',
    ]);

    $pesanan = Pesanan::findOrFail($id);
    $pesanan->update($data);

    return redirect()
        ->route('admin.pesanan')
        ->with('success', 'Status pesanan berhasil diperbarui!');
}

public function pesanan()
{
    // 1. Ambil semua pesanan beserta detail menu yang dipesan
    $pesanans = Pesanan::with('detailPesanans.menu')
        ->latest()
        ->get();

    // 2. Hitung seluruh pesanan
    $totalPesanan = Pesanan::count();

    // 3. Hitung pesanan yang sedang diproses
    $pesananDiproses = Pesanan::where(
        'status',
        'Diproses'
    )->count();

    // 4. Hitung pesanan yang sudah selesai
    $pesananSelesai = Pesanan::where(
        'status',
        'Selesai'
    )->count();

    // 5. Kirim data ke halaman Blade
    return view('admin.pesanan', compact(
        'pesanans',
        'totalPesanan',
        'pesananDiproses',
        'pesananSelesai'
    ));
}


}
