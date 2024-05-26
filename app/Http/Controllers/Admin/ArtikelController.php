<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $items = Artikel::latest()->get();
        return view('admin.pages.artikel.index', [
            'title' => 'Artikel',
            'items'  => $items
        ]);
    }

    public function create()
    {
        $data_kategori = KategoriArtikel::orderBy('nama', 'ASC')->get();
        return view('admin.pages.artikel.create', [
            'title' => 'Tambah Artikel',
            'data_kategori' => $data_kategori
        ]);
    }

    public function store()
    {
        request()->validate([
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'kategori_artikel_id' => ['required'],
            'judul' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required']
        ]);

        $data = request()->all();
        $data['slug'] = \Str::slug(request('judul')) . '-' . rand(999, 9999);
        $data['gambar'] = request()->file('gambar')->store('artikel', 'public');
        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $item = Artikel::findOrFail($id);
        $data_kategori = KategoriArtikel::orderBy('nama', 'ASC')->get();
        return view('admin.pages.artikel.edit', [
            'title' => 'Edit Artikel',
            'item' => $item,
            'data_kategori' => $data_kategori
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'kategori_artikel_id' => ['required'],
            'judul' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required']
        ]);

        $data = request()->all();
        $data['slug'] = \Str::slug(request('judul')) . '-' . rand(999, 9999);
        $item = Artikel::findOrFail($id);
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('artikel', 'public');
        }
        Artikel::create($data);
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Artikel::findOrFail($id);
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }
        $item->delete();
        return redirect()->back()->with('success', 'Artikel berhasil dihapus.');
    }
}
