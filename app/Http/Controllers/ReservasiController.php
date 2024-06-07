<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index()
    {
        return view('pages.reservasi.index', [
            'title' => 'Reservasi'
        ]);
    }

    public function cek()
    {
        $data = request()->all();
        // cek hari dan jam tersebut apakah reservasi ada
        $cekData = Reservasi::where('tanggal', request('tanggal'))->where('jam', request('jam'))->whereIn('status', [0, 1]);
        if ($cekData->count() > 0) {
            $reservasi_ada = $cekData->first()->details()->pluck('meja_id');
        } else {
            $reservasi_ada = [];
        }
        $data_meja = Meja::where('status', 0)->whereNotIn('id', $reservasi_ada)->get();
        return view('pages.reservasi.cek', [
            'title' => 'Cek Ketersediaan',
            'data' => $data,
            'data_meja' => $data_meja,
        ]);
    }

    public function submit()
    {
        request()->validate([
            'data' => ['required'],
            'meja_id' => ['required', 'array']
        ]);

        $data_json = json_decode(request('data'));
        $data = [
            'nama' => $data_json->nama,
            'nomor_telepon' => $data_json->nomor_telepon,
            'jumlah_pengunjung' => $data_json->jumlah_pengunjung,
            'tanggal' => $data_json->tanggal,
            'jam' => $data_json->jam
        ];
        $data_meja = request('meja_id');
        // dd($data);
        DB::beginTransaction();
        try {
            $data['status'] = 0;
            $data['user_id'] = auth()->id();
            $data['kode'] = Reservasi::getNewCode();
            $reservasi = Reservasi::create($data);
            foreach ($data_meja as $meja) {
                $reservasi->details()->create([
                    'meja_id' => $meja
                ]);
            }

            DB::commit();

            return redirect()->route('reservasi.success', $reservasi->kode)->with('success', 'Reservasi berhasil dilakukan. Mohon menunggu admin memverifikasi reservasi.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function success($kode)
    {
        $reservasi = Reservasi::with(['details.meja'])->where('kode', $kode)->firstOrFail();
        return view('pages.reservasi.success', [
            'title' => 'Detail Reservasi',
            'item' => $reservasi
        ]);
    }
}