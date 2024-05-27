<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $items = Meja::orderBy('kode', 'ASC')->get();
        return view('admin.pages.meja.index', [
            'title' => 'Meja',
            'items'  => $items
        ]);
    }

    public function create()
    {
        $getNewCode = Meja::getNewCode();
        return view('admin.pages.meja.create', [
            'title' => 'Tambah Meja',
            'getNewCode' => $getNewCode
        ]);
    }

    public function store()
    {
        request()->validate([
            'jenis' => ['required'],
            'jumlah_maksimal' => ['required']
        ]);

        $data = request()->all();
        $data['kode'] = Meja::getNewCode();
        Meja::create($data);

        return redirect()->route('admin.meja.index')->with('success', 'Meja berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $item = Meja::findOrFail($id);
        return view('admin.pages.meja.edit', [
            'title' => 'Edit Meja',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'status' => ['required'],
            'jumlah_maksimal' => ['required']
        ]);

        $item = Meja::findOrFail($id);
        $data = request()->all();
        $item->update($data);

        return redirect()->route('admin.meja.index')->with('success', 'Meja berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Meja::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Meja berhasil dihapus.');
    }
}
