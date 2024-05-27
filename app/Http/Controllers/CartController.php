<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Discount;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\CartItemOrder;
use App\Models\DashboardCashier;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $carts = CartItem::where('user_id', $user_id)->get();
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

        return view('cart.index', compact('carts', 'totalItems', 'totalPrice', 'title','user_id', 'snapToken'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_id' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['jumlah'] = 1;

        $existingCartItem = CartItem::where('menu_id', $validated['menu_id'])
            ->where('user_id', $validated['user_id'])
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

    $user_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('user_id', $user_id)
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

    $user_id = Auth::id();
    $menu_id = $validated['menu_id'];

    // Cek apakah produk sudah ada di keranjang
    $cart = CartItem::where('user_id', $user_id)
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

public function applyDiscount(Request $request)
{
    $validated = $request->validate([
        'discount' => 'nullable|string',
    ]);

    $discountAmount = 0;
    if (!empty($validated['discount'])) {
        $discount = Discount::where('code', $validated['discount'])->first();
        if ($discount) {
            $discountAmount = $discount->amount;
            session(['discountAmount' => $discountAmount]);
            session(['discountCode' => $validated['discount']]);
        } else {
            return redirect()->back()->with('error', 'Kode diskon tidak valid.');
        }
    }

    return redirect()->back()->with('success', 'Kode diskon berhasil diterapkan.');
}

public function storeOrder(Request $request)
{
    $validated = $request->validate([
        'special_message' => 'nullable|string',
    ]);

    $user_id = auth()->id();
    $carts = CartItem::where('user_id', $user_id)->get();

    $totalPrice = 0;
    $totalItems = $carts->sum('jumlah');

    foreach ($carts as $cart) {
        $subtotal = $cart->jumlah * $cart->menu->harga;
        $totalPrice += $subtotal;
    }

    // Apply discount if available
    $discountAmount = session('discountAmount', 0);
    $discountCode = session('discountCode', '');
    $totalPrice -= $discountAmount;

    // Determine the next order number for the user
    $lastOrder = CartItemOrder::where('user_id', $user_id)->orderBy('nomor', 'desc')->first();
    $nextOrderNumber = $lastOrder ? $lastOrder->nomor + 1 : 1;

    // Save special message and discount info
    $order = OrderTable::create([
        'user_id' => $user_id,
        'special_message' => $validated['special_message'],
        'nomor' => $nextOrderNumber,
    ]);
  
    // Save cart items to CartItemOrder
    foreach ($carts as $cart) {
        $itemorder = CartItemOrder::create([
            'user_id' => $cart->user_id,
            'nomor' => $nextOrderNumber, // Set the order number
            'menu_id' => $cart->menu_id,
            'order_table_id' => $order->id,
            'jumlah' => $cart->jumlah,
        ]);
    }

    // Save order to DashboardCashier
    DashboardCashier::create([
        'ordertable_id' => $order->id,
        'cartitemorder_id' => $itemorder->id,
        'qty' => $totalItems,
        'total_price' => $totalPrice,
        'status' => 'Unpaid'
    ]);

    // Delete cart items after saving to CartItemOrder
    CartItem::where('user_id', $user_id)->delete();   

    // Clear discount session
    session()->forget(['discountAmount', 'discountCode']);
  
    return redirect()->route('checkout');

}

public function checkout()
{
    $user_id = Auth::id();

    // Ambil DashboardCashier yang belum dibayar
    $dashboardCashier = DashboardCashier::where('status', 'Unpaid')->first();

    // Pastikan ada dashboard cashier yang belum dibayar
    if ($dashboardCashier) {
        // Ambil item yang sesuai dengan nomor dashboard_cashier
        $items = CartItemOrder::where('user_id', $user_id)
                    ->where('nomor', $dashboardCashier->id)
                    ->get();

        // Pastikan ada item yang ditampilkan
        if ($items->isNotEmpty()) {
            $user = Auth::user();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $order_id = $dashboardCashier->id . '-' . time();

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_id,
                    'gross_amount' => $dashboardCashier->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $user->username,
                    'last_name' => '',
                    'phone' => $user->phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('dummy', compact('items', 'snapToken'));
        }
    }

    // Jika tidak ada item atau dashboard cashier belum dibayar, kembali ke halaman lain
    return redirect()->route('index')->with('error', 'Tidak ada item untuk checkout.');
}

public function callback(Request $request)
{
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    if ($hashed == $request->signature_key) {
        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $order_id = explode('-', $request->order_id)[0];
            $order = DashboardCashier::find($order_id);
            if ($order) {
                $order->update(['status' => 'Paid']);
            }
        }
    }
}

public function invoice($id){
    $title = 'invoice';
    $user_id = Auth::id();
    $cashier =  DashboardCashier::where('status', 'Paid')->first();

    $orders = CartItemOrder::where('user_id', $user_id)
                ->where('nomor', $cashier->id)
                ->get();

    
    return view('invoice', compact('title','orders'));
}

}