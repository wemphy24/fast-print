<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $fillable = [
        'nama_status',
    ];

    // status memiliki banyak produk
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}
