<?php
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\BlogController as publicBlogController;
use Illuminate\Support\Facades\Route;


//user routes

Route::view('/', 'home')->name('home');

Route::view('/tentang', 'tentang')->name('tentang');

Route::get('/menu', [MenuController::class, 'daftarMenu'])->name('menu');

Route::view('/kontak', 'kontak')->name('kontak');

Route::get('/pesan', [MenuController::class, 'formPesanan'])
    ->name('pesan');

    Route::post('/pesan', [PesananController::class, 'simpan'])
    ->name('pesanan.store');

Route::view('/pesanan-terkirim', 'pesanan-terkirim')
    ->name('pesanan.terkirim');

Route::get('/artikel', [publicBlogController::class, 'index'])
    ->name('blog.index');

Route::get('/artikel/{post:slug}', [publicBlogController::class, 'show'])
    ->name('blog.show');

// Admin Routes

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu');
    Route::patch(
    '/admin/pesanan/{id}/status',
    [MenuController::class, 'updateStatus']
)->name('admin.pesanan.status');
    Route::get('/admin/menu/tambah', [MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
    Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
    Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
    Route::get('/admin/dashboard', [MenuController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/pesanan', [MenuController::class, 'pesanan'])->name('admin.pesanan');

    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('blog', BlogController::class)
        ->names('blog')
        ->parameters(['blog' => 'post'])
        ->except(['show']);
});
});
