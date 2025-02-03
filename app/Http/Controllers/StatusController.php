<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuss = Status::all();
        return view('status.index', compact('statuss'));
    }

    public function tambah()
    {
        return view('status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_status' => 'required|string|max:255',
        ]);

        Status::create([
            'nama_status' => $request->nama_status,
        ]);

        return to_route('status.index')->with('success', 'Status berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $status = Status::findOrFail($id);
        return view('status.edit', compact('status'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nanma_status' => 'required|string|max:255',
        ]);

        Status::where('id', $id)->update([
            'nanma_status' => $request->nanma_status,
        ]);
        return to_route('status.index')->with('success', 'Status berhasil diubah');
    }

    public function hapus($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return to_route('status.index')->with('success', 'Status berhasil dihapus');
    }
}
