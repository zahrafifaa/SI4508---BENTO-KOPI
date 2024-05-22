<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\CartItemOrder;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart_id = Auth::id();
        $carts = CartItem::where('cart_id', $cart_id)->get();
        $title = "Cart";
        $totalPrice = 0;
        $totalItems = $carts->sum('jumlah');

        foreach ($carts as $cart) {
            $subtotal = $cart->jumlah * $cart->menu->harga;
            $totalPrice += $subtotal;
        }

        if(session('snapToken')){
            $snapToken = session()->get('snapToken');
        }else{
            $snapToken ='';
        }

        return view('cart.index', compact('carts', 'totalItems', 'totalPrice', 'title','cart_id', 'snapToken'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required',
        ]);

        $validated['cart_id'] = auth()->id();
        $validated['jumlah'] = 1;

        $existingCartItem = CartItem::where('menu_id', $validated['menu_id'])
            ->where('cart_id', $validated['cart_id'])
            ->first();

        if ($existingCartItem) {
            $existingCartItem->jumlah += 1;
            $existingCartItem->save();
        } else {
            $cart = CartItem::create($validated);
        }

        return redirect()->back();
    }

    public function destroy($id)
{

    CartItem::destroy($id);
    return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
}

public function increaseQuantity(Request $request)
{
    $validated = $request->validate([
        'menu_id' => 'required',
    ]);

    $cart_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('cart_id', $cart_id)
                ->where('menu_id', $menu_id)
                ->first();

    if ($cart) {
        // Tingkatkan jumlahnya
        $cart->jumlah += 1;
        $cart->save();
    }

    return redirect()->back();
}

public function reduceQuantity(Request $request)
{
    $validated = $request->validate([
        'menu_id' => 'required',
    ]);

    $cart_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('cart_id', $cart_id)
                ->where('menu_id', $menu_id)
                ->first();

    if ($cart) {
        // Kurangi jumlahnya jika lebih dari 1, jika tidak hapus entri dari keranjang
        if ($cart->jumlah > 1) {
            $cart->jumlah -= 1;
            $cart->save();
        } else {
            $cart->delete();
        }
    }

    return redirect()->back();
}

public function storeOrder(Request $request)
{
    $validated = $request->validate([
        'special_message' => 'nullable|string',
    ]);

    $user_id = Auth::id();
    $carts = CartItem::where('cart_id', $user_id)->get();

    $totalPrice = 0;
    $totalItems = $carts->sum('jumlah');

    foreach ($carts as $cart) {
        $subtotal = $cart->jumlah * $cart->menu->harga;
        $totalPrice += $subtotal;
    }

    // Save special message
    $order = OrderTable::create([
        'cart_id' => $user_id,
        'special_message' => $validated['special_message']
    ]);

    // Determine the next order number for the user
    $lastOrder = CartItemOrder::where('cart_id', $user_id)->orderBy('nomor', 'desc')->first();
    $nextOrderNumber = $lastOrder ? $lastOrder->nomor + 1 : 1;

    // Save cart items to CartItemOrder
    foreach ($carts as $cart) {
        CartItemOrder::create([
            'cart_id' => $cart->cart_id,
            'nomor' => $nextOrderNumber, // Set the order number
            'menu_id' => $cart->menu_id,
            'jumlah' => $cart->jumlah,
        ]);
    }

    // Save order to DashboardCashier
    $dashboardCashier = DashboardCashier::create([
        'ordertable_id' => $order->id,
        // 'cartitem_id' => $order->cart_id,
        'qty' => $totalItems,
        'total_price' => $totalPrice,
        'status' => 'Unpaid'
    ]);

    // Delete cart items after saving to CartItemOrder
    CartItem::where('cart_id', $user_id)->delete();   
    
    $cartItemOrder = CartItemOrder::with('cart.user');
    $user = $cartItemOrder->first()->cart->user;

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => $dashboardCashier->id,
            'gross_amount' => $dashboardCashier->total_price,
        ),
        'customer_details' => array(
            'name' => $user->username,
            'phone' => $user->phone,
        ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);  
    return redirect()->route('checkout');

}

public function checkout()
{
    $cart_id = Auth::id();
    $items = CartItemOrder::where('cart_id',$cart_id)->get();
    // Save order to DashboardCashier
    $dashboardCashier = DashboardCashier::first();
    
    $cartItemOrder = CartItemOrder::with('cart.user');
    $user = $cartItemOrder->first()->cart->user;

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
        'transaction_details' => array(
            'order_id' => $dashboardCashier->id,
            'gross_amount' => $dashboardCashier->total_price,
        ),
        'customer_details' => array(
            'name' => $user->username,
            'phone' => $user->phone,
        ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params); 
    return view('dummy', compact('items','snapToken'));

}

}