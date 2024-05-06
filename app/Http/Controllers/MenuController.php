<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menu()
    {
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::all();
        $sort = 'null';
        return view('menu', compact('menus', 'categories', 'sort'));
    }
    public function searchMenu(Request $request)
    {
        $query = $request->input('query');
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('nama', 'like', "%$query%")->get();
        $sort = 'null';
        return view('menu', compact('menus', 'categories', 'sort'));
    }
    public function searchMenuByCategory($kategori, Request $request)
    {
        $query = $request->input('query');
        $categorynow = $kategori;
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->where('nama', 'like', "%$query%")->paginate(4);
        $sort = 'null';
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort'));
    }
    public function sortmenu($option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $sort = $option;
        switch ($option) {
            case 'termurah':
                $menus = Menu::orderBy('harga')->get();
                break;
            case 'termahal':
                $menus = Menu::orderByDesc('harga')->get();
                break;
        }
        return view('menu', compact('menus', 'categories', 'sort'));
    }

    public function showMenuByCategory($kategori)
    {
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->paginate(4);
        $categorynow = $kategori;
        $sort = "null";
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort'));
    }
    public function sortShowMenuByCategory($kategori, $option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $categorynow = strtolower($kategori); // Ubah ke huruf kecil
        $sort = $option;
        switch ($option) {
            case 'termurah':
                $menus = Menu::where('kategori', $kategori)->orderBy('harga')->paginate(4);
                break;
            case 'termahal':
                $menus = Menu::where('kategori', $kategori)->orderByDesc('harga')->paginate(4);
                break;
        }

        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort'));
    }
    public function adminMenuMakanan()
    {
        $menus = Menu::where('jenis', 'makanan')->get();
        return view('admin.menu-makanan', compact('menus'));
    }
    public function adminMenuMinuman()
    {
        $menus = Menu::where('jenis', 'minuman')->get();
        return view('admin.menu-minuman', compact('menus'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function adminStore(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $validatedData = $request->validate([
                'nama' => 'required|string',
                'jenis' => 'required|string',
                'kategori' => 'required|string',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                'deskripsi' => 'required|string',
                'harga' => 'required|numeric|min:0',
            ]);
            $validatedData['admin_id'] = Auth::guard('admin')->user()->id;
            if ($request->hasFile('gambar')) {
                $namaGambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $gambarPath = $request->file('gambar')->storeAs('public/images/menu', $namaGambar);
                $validatedData['gambar'] = '/storage/images/menu/' . $namaGambar;
            }
            $menu = Menu::create($validatedData);
            return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'jenis' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        try {
            DB::beginTransaction();
            $menu = Menu::findOrFail($request->id);
            $menu->nama = $request->nama;
            $menu->kategori = $request->kategori;
            $menu->deskripsi = $request->deskripsi;
            $menu->harga = $request->harga;
            $menu->jenis = $request->jenis;
            $menu->save();
            if ($request->hasFile('gambar')) {
                if ($menu->gambar) {
                    $namaGambar = basename($menu->gambar);
                    Storage::delete('public/images/menu/' . $namaGambar);
                }
                $namaGambar = time() . '.' . $request->file('gambar')->getClientOriginalExtension();
                $gambarPath = $request->file('gambar')->storeAs('public/images/menu', $namaGambar);
                $menu->gambar = '/storage/images/menu/' . $namaGambar;
                $menu->save();
            }
            DB::commit();
            return redirect()->back()->with('success', 'Menu berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal memperbarui menu. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            // Hapus data menu makanan dari database
            DB::beginTransaction();
            $menu = Menu::findOrFail($id);
            $menu->delete();
            $gambar = $menu->gambar;
            DB::commit();

            // Hapus gambar menu dari penyimpanan jika ada
            if (!empty($menu->gambar)) {
                $namaGambar = basename($gambar);
                Storage::delete('public/images/menu/' . $namaGambar);
            }

            return redirect()->back()->with('success', 'Data menu makanan dan gambarnya berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus data menu dan gambarnya: ' . $e->getMessage()]);
        }
    }

}