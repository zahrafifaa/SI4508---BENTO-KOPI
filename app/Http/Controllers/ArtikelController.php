<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::id();
        $categories = KategoriArtikel::all(); // Mengambil semua kategori
        $query = Artikel::query();

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $kategori = KategoriArtikel::where('slug', $request->kategori)->firstOrFail();
            $query->where('kategori_artikel_id', $kategori->id);
        }

        // Urutkan berdasarkan input pengguna
        if ($request->filled('urutan')) {
            $query->orderBy('created_at', $request->urutan === 'terbaru' ? 'desc' : 'asc');
        }

        $items = $query->paginate(10); // Paginasi
        $title = 'Artikel';

        return view('pages.artikel.index', compact('user', 'categories', 'items', 'title'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'kategori_artikel_id' => ['required'],
            'judul' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required']
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul) . '-' . rand(999, 9999);
        $item = Artikel::findOrFail($id);

        if ($request->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $item->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate.');
    }

    public function show($slug)
    {
        $item = Artikel::where('slug', $slug)->firstOrFail();
        $title = 'Detail Artikel';

        return view('pages.artikel.show', compact('item', 'title'));
    }
}
