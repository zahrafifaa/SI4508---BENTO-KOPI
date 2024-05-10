<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\DashboardKollab;
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
use App\Models\Kolaborasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7

class KolaborasiController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $items = Kolaborasi::acc()->latest()->get();
=======
        // $items = Kolaborasi::acc()->latest()->get();
        $items = DashboardKollab::all();
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
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
<<<<<<< HEAD
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
=======
            'organisasi' => ['required'],
            'jabatan' => ['required'],
            'deskripsi_singkat' => ['required'],
            'tanggal' => ['required'],
            'surat' => ['required', 'file', 'mimes:pdf'],
            'email' => ['required', 'unique:users,email'],
            'nomor' => ['required', 'numeric'],
        ]);

        $data = request()->all();
        $data['user_id'] = auth()->id();
        $data['status'] = 0;
        $data['surat'] = request()->file('surat')->store('kolaborasi', 'public');
        Kolaborasi::create($data);
        return redirect('/kolaborasi')->with('success', 'Anda berhasil melamar pekerjaan ini.');

        // DB::beginTransaction();
        // try {
        //     $data_kolaborasi = request()->all();
        //     // create user
        //     $user = User::create([
        //         'name' => request('nama'),
        //         'email' => request('email'),
        //         'password' => bcrypt(request('password'))
        //     ]);
        //     // create kolaborasi
        //     $data_kolaborasi['status'] = 0;
        //     $data_kolaborasi['gambar'] = request()->file('gambar')->store('kolaborasi', 'public');
        //     $user->kolaborasi()->create($data_kolaborasi);
        //     DB::commit();
        //     return redirect()->back()->with('success', 'Pengajuan untuk kolaborasi berhasil dilakukan.');
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
    }

    public function show($id)
    {
<<<<<<< HEAD
        $item = Kolaborasi::acc()->findOrFail($id);
        return view('pages.kolaborasi.show', [
            'title' => 'Detail Kolaborasi',
            'item' => $item
        ]);
    }
=======
        $item = DashboardKollab::findOrFail($id);
        return view('pages.kolaborasi.show', [
            'title' => 'Kolaborasi',
            'item' => $item
        ]);
    }

>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7
}
