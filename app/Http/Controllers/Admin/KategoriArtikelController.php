<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $items = KategoriArtikel::orderBy('nama', 'ASC')->get();
        return view('dashboard.pages.kategori-artikel.index', [
            'title' => 'Kategori Artikel',
            'items'  => $items
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.kategori-artikel.create', [
            'title' => 'Tambah Kategori Artikel'
        ]);
    }

    public function store()
    {
        request()->validate([
            'nama' => ['required']
        ]);

        KategoriArtikel::create([
            'nama' => request('nama'),
            'slug' => Str::slug(request('nama'))
        ]);

        return redirect()->route('admin.kategori-artikel.index')->with('success', 'Kategori Artikel berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $item = KategoriArtikel::findOrFail($id);
        return view('dashboard.pages.kategori-artikel.edit', [
            'title' => 'Edit Kategori Artikel',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'nama' => ['required']
        ]);

        $item = KategoriArtikel::findOrFail($id);
        $item->update([
            'nama' => request('nama'),
            'slug' => Str::slug(request('nama'))
        ]);

        return redirect()->route('admin.kategori-artikel.index')->with('success', 'Kategori Artikel berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = KategoriArtikel::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Kategori Artikel berhasil dihapus.');
    }
}