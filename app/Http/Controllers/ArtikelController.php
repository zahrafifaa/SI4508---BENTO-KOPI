<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $kategori = request('kategori');
        $urutan = request('urutan');
        $items = Artikel::whereNotNull('id');
        if ($kategori) {
            $items->whereHas('kategori_artikel', function ($q) use ($kategori) {
                $q->where('slug', $kategori);
            });
        }
        if ($urutan) {
            if ($urutan === 'terbaru')
                $items->orderBy('id', 'DESC');
            else
                $items->orderBy('id', 'ASC');
        }

        $artikels = $items->paginate(6);

        $categories = KategoriArtikel::orderBy('nama', 'ASC')->get();
        return view('pages.artikel.index', [
            'title' => 'List Artikel',
            'items' => $artikels,
            'categories'  => $categories
        ]);
    }

    public function show($slug)
    {
        $item = Artikel::where('slug', $slug)->firstOrFail();
        return view('pages.artikel.show', [
            'title' => $item->judul,
            'item' => $item
        ]);
    }
}
