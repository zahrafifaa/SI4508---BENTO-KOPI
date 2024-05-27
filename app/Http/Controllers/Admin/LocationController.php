<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $items = Location::latest()->get();
        return view('admin.pages.location.index', [
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
            'nama' => ['required'],
            'jam_buka' => ['required'],
            'jam_tutup' => ['required'],
            'alamat' => ['required']
        ]);

        $data = request()->all();
        $data['gambar'] = request()->file('gambar')->store('location', 'public');
        Location::create($data);

        return redirect()->route('admin.location.index')->with('success', 'Location berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $item = Location::findOrFail($id);
        return view('admin.pages.location.edit', [
            'title' => 'Edit Location',
            'item' => $item,
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'gambar' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'nama' => ['required'],
            'jam_buka' => ['required'],
            'jam_tutup' => ['required'],
            'alamat' => ['required']
        ]);

        $data = request()->all();
        $item = Location::findOrFail($id);
        if (request()->file('gambar')) {
            if ($item->gambar) {
                Storage::disk('public')->delete($item->gambar);
            }
            $data['gambar'] = request()->file('gambar')->store('location', 'public');
        }
        $item->update($data);
        return redirect()->route('admin.location.index')->with('success', 'Location berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Location::findOrFail($id);
        if ($item->gambar) {
            Storage::disk('public')->delete($item->gambar);
        }
        $item->delete();
        return redirect()->back()->with('success', 'Location berhasil dihapus.');
    }
}
