<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    protected $fillable = [
    'nama_pelanggan',
    'tipe',
    'alamat',
    'catatan',
    'total_harga',
    'status',
];

    public function detailPesanans(): HasMany
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
