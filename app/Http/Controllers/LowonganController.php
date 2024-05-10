<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Melamar;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $items = Lowongan::where('status', 1)->latest()->get();
        return view('pages.lowongan.index', [
<<<<<<< HEAD
            'title' => 'Apply',
=======
            'title' => 'Lowongan Pekerjaan',
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = Lowongan::findOrFail($id);
        return view('pages.lowongan.show', [
<<<<<<< HEAD
            'title' => 'Apply',
=======
            'title' => 'Detail Lowongan',
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
            'item' => $item
        ]);
    }
    public function apply($id)
    {
        $item = Lowongan::findOrFail($id);
        return view('pages.lowongan.apply', [
<<<<<<< HEAD
            'title' => 'Apply',
=======
            'title' => 'Apply Lowongan',
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
            'item' => $item
        ]);
    }

    public function proses($lowongan_id)
    {
        request()->validate([
            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'nomor_hp' => ['required'],
            'email' => ['required'],
            'pengalaman_kerja' => ['required'],
            'cv' => ['required', 'file', 'mimes:pdf'],
            'foto' => ['required', 'image', 'mimes:jpg,png,jpeg']
        ]);


        $data = request()->all();
        $data['foto'] = request()->file('foto')->store('melamar', 'public');
        $data['cv'] = request()->file('cv')->store('melamar', 'public');
        $data['lowongan_id'] = $lowongan_id;
        Melamar::create($data);
<<<<<<< HEAD
        return redirect('/apply')->with('success', 'Anda berhasil melamar pekerjaan ini.');
=======
        return redirect()->back()->with('success', 'Anda berhasil melamar pekerjaan ini.');
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
    }
}
