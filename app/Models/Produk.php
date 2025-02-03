<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    // karena disini menggunakan bahasa indonesia, nama tabel harus disesuaikan terlebih dahulu
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori_id',
        'status_id',
    ];

    // produk memiliki relasi dengan kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // produk memiliki relasi dengan status
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
