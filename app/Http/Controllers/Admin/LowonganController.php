<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LowonganController extends Controller
{
    public function index()
    {
        $items = Lowongan::latest()->get();
        return view('admin.pages.lowongan.index', [
            'title' => 'lowongan',
            'items'  => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.lowongan.create', [
            'title' => 'Tambah lowongan'
        ]);
    }

    public function store()
    {
        request()->validate([
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'tanggal_buka' => ['required'],
            'judul' => ['required'],
            'tanggal_tutup' => ['required'],
            'deskripsi' => ['required'],
            'status' => ['required']
        ]);

        $data = request()->all();
        $data['gambar'] = request()->file('gambar')->store('lowongan', 'public');
        Lowongan::create($data);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $item = Lowongan::findOrFail($id);
        return view('admin.pages.lowongan.edit', [
            'title' => 'Edit lowongan',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'tanggal_buka' => ['required'],
            'judul' => ['required'],
            'tanggal_tutup' => ['required'],
            'deskripsi' => ['required'],
            'status' => ['required']
        ]);

        $data = request()->all();
        $item = Lowongan::findOrFail($id);
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('lowongan', 'public');
        }
        $item->update($data);
        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Lowongan::findOrFail($id);
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }
        $item->delete();
        return redirect()->back()->with('success', 'Lowongan berhasil dihapus.');
    }
}
