<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function tambah()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return to_route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::where('id', $id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return to_route('kategori.index')->with('success', 'Kategori berhasil diubah');
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return to_route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
