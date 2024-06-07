<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $items = Location::latest()->get();
        return view('dashboard.pages.location.index', [
            'title' => 'Location',
            'items'  => $items
        ]);
    }

    public function create()
    {
        return view('admin.pages.location.create', [
            'title' => 'Tambah Location',
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