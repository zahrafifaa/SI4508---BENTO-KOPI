<?php

namespace App\Http\Controllers;

use App\Models\Kolaborasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KolaborasiController extends Controller
{
    public function index()
    {
        $items = Kolaborasi::acc()->latest()->get();
        return view('pages.kolaborasi.index', [
            'title' => 'Kolaborasi',
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('pages.kolaborasi.create', [
            'title' => 'Kolaborasi'
        ]);
    }

    public function proses()
    {
        request()->validate([
            'nama' => ['required'],
            'deskripsi_singkat' => ['required'],
            'deskripsi' => ['required'],
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:5', 'confirmed'],
            'password_confirmation' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data_kolaborasi = request()->only(['nama', 'deskripsi_singkat', 'deskripsi']);
            // create user
            $user = User::create([
                'name' => request('nama'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);
            // create kolaborasi
            $data_kolaborasi['status'] = 0;
            $data_kolaborasi['gambar'] = request()->file('gambar')->store('kolaborasi', 'public');
            $user->kolaborasi()->create($data_kolaborasi);
            DB::commit();
            return redirect()->back()->with('success', 'Pengajuan untuk kolaborasi berhasil dilakukan.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        $item = Kolaborasi::acc()->findOrFail($id);
        return view('pages.kolaborasi.show', [
            'title' => 'Detail Kolaborasi',
            'item' => $item
        ]);
    }
}
