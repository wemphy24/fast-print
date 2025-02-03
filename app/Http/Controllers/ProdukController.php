<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Status;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Untuk menampilkan halaman index produk
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    // Untuk menampilkan halaman tambah produk
    public function tambah()
    {
        // Ambil data yang berelasi dengan produk
        $kategoris = Kategori::all();
        $statuss = Status::all();
        return view('produk.create', compact('kategoris', 'statuss'));
    }

    // Untuk menginsert data ke dalam tabel produk
    public function store(Request $request)
    {
        // Validasi sebelum data dimasukkan ke tabel produk
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:1',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);

        // Insert data 
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id' => $request->status_id,
        ]);
        return to_route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan halaman ubah produk
    public function ubah($id)
    {
        // Cari produk berdasarkan id yang didapat melalui request url
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        $statuss = Status::all();
        return view('produk.edit', compact('produk','kategoris','statuss'));
    }

    // Untuk mengupdate data yang ada dalam tabel produk
    public function update(Request $request, $id)
    {
        // Validasi sebelum data diubah
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:1',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);

        // Update data
        Produk::where('id', $id)->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id' => $request->status_id,
        ]);
        return to_route('produk.index')->with('success', 'Produk berhasil diubah');
    }

    // Untuk menghapus data yang ada pada tabel produk
    public function hapus($id)
    {
        // Cari produk berdasarkan id yang didapat melalui request url
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return to_route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
