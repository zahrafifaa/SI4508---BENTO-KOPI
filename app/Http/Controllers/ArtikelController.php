<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
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
        $data['slug'] = Str::slug(request('judul')) . '-' . rand(999, 9999);
        $item = Artikel::findOrFail($id);

        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('artikel', 'public');
        }

        $item->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate.');
    }
}
