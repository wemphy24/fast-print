<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // karena disini menggunakan bahasa indonesia, nama tabel harus disesuaikan terlebih dahulu
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori',
    ];

    // kategori memiliki banyak produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
