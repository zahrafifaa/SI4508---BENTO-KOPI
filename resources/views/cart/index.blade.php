@extends('layout/main')

@section('isiPage')
<div class="row">
    <div class="col-md-9">
        <table id="cart" class="table table-striped table-sm mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Subtotal</th>  
                    <th scope="col">Action</th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cart->menu->nama }}</td>
                    <td>{{ $cart->menu->harga }}</td>
                    <td>{{ $cart->jumlah }}</td>
                    <td>{{ $cart->menu->harga * $cart->jumlah }}</td>
                    <td>
                        <!-- Form untuk mengurangi jumlah -->
                        <form action="{{ route('cart.reduceQuantity') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                            <button class="badge bg-warning"><i data-feather='alert-circle'></i></button>
                        </form>

                        <!-- Form untuk menghapus item -->
                        <form action="{{ route('cart.destroy', $cart->menu_id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="badge bg-info"><i data-feather='trash-2'></i></span></button>
                        </form>

                        <!-- Form untuk menambah jumlah -->
                        <form action="{{ route('cart.increaseQuantity') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                            <button class="badge bg-warning"><i data-feather='plus'></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <!-- Kolom kanan untuk menampilkan total harga -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Summary</h5>
                <p>Total Price: {{ $totalPrice }}</p>
                <p>Total Items: {{ $totalItems }}</p>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <div class="pesan tambahan">
    <form action="{{ route('cart.storeMessage') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
        <textarea name="pesan" placeholder="Ketikkan pesan Anda di sini"></textarea>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>
    
</div> --}}