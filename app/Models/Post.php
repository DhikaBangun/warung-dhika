<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'gambar',
        'diterbitkan',
    ];

    protected function casts(): array
    {
        return [
            'diterbitkan' => 'boolean',
        ];
    }
}
