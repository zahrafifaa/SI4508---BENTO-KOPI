<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

use Illuminate\Http\Request;

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
        $title = 'Menu';
        return view('menu', compact('menus', 'categories', 'sort','title'));
    }
    public function searchMenu( Request $request){
        $query = $request->input('query');
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('nama', 'like', "%$query%")->get();
        $sort = 'null';
        $title = 'menu';
        return view('menu', compact('menus', 'categories', 'sort', 'title'));
    }
    public function searchMenuByCategory($kategori,Request $request){
        $query = $request->input('query');
        $categorynow = $kategori;
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->where('nama', 'like', "%$query%")->paginate(4);
        $sort = 'null';
        $title = 'menu';
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title'));
    }
    public function sortmenu($option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $sort = $option;
        $title = 'menu';
        switch ($option) {
            case 'termurah':
                $menus = Menu::orderBy('harga')->get();
                break;
            case 'termahal':
                $menus = Menu::orderByDesc('harga')->get();
                break;
        }
        return view('menu', compact('menus', 'categories', 'sort', 'title'));
    }

    public function showMenuByCategory($kategori)
    {
        $categories = Menu::pluck('kategori')->unique();
        $menus = Menu::where('kategori', $kategori)->paginate(4);
        $categorynow = $kategori;
        $sort = "null";
        $title = 'menu';
        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title'));
    }
    public function sortShowMenuByCategory($kategori, $option)
    {
        $categories = Menu::pluck('kategori')->unique();
        $categorynow = strtolower($kategori); // Ubah ke huruf kecil
        $sort = $option;
        $title = 'menu';
        switch ($option) {
            case 'termurah':
                $menus = Menu::where('kategori', $kategori)->orderBy('harga')->paginate(4);
                break;
            case 'termahal':
                $menus = Menu::where('kategori', $kategori)->orderByDesc('harga')->paginate(4);
                break;
        }

        return view('showmenubycategory', compact('menus', 'categories', 'categorynow', 'sort', 'title'));
    }

    // public function indexs()
    // {
    //     $menus = Menu::all();
    //     return view('cart.products', compact('menus'));
    // }
  
    // public function menuCart()
    // {
    //     return view('cart.carts');
    // }
    // public function addMenutoCart($id)
    // {
    //     $menu = Menu::findOrFail($id);
    //     $cart = session()->get('cart', []);
    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "nama" => $menu->nama,
    //             "quantity" => 1,
    //             "harga" => $menu->harga,
    //             "gambar" => $menu->gambar
    //         ];
    //     }
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'menu has been added to cart!');
    // }
    
    // public function updateCart(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'menu added to cart.');
    //     }
    // }
  
    // public function deleteProduct(Request $request)
    // {
    //     if($request->id) {
    //         $cart = session()->get('cart');
    //         if(isset($cart[$request->id])) {
    //             unset($cart[$request->id]);
    //             session()->put('cart', $cart);
    //         }
    //         session()->flash('success', 'menu successfully deleted.');
    //     }
    // }


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
    public function store(StoreMenuRequest $request)
    {
        //
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
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}