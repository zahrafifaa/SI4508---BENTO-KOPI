@extends('layout/main')


@section('isiPage')
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
          <td>{{ ($cart->menu->harga)*($cart->jumlah )}}</td>
          <td>
            
            <form action="{{ route('cart.destroy', $cart->menu_id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="badge bg-info"><i data-feather='trash-2'></i></span></button>
            </form>

            <form action="{{ route('cart.reduceQuantity')  }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                <button class="badge bg-danger"><i data-feather='minus'></i></button>
            </form>

            <form action="{{ route('cart.increaseQuantity')  }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                <button class="badge bg-primary"><i data-feather='plus'></i></button>
            </form>

           
          </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-right">Total Price</td>
            <td>{{ $totalPrice }}</td>
            <td>{{ $totalItems }}</td>
            <td></td>
        </tr>
    </tbody>
</table>


@endsection
{{-- <div class="pesan tambahan">
    <form action="{{ route('cart.storeMessage') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
        <textarea name="pesan" placeholder="Ketikkan pesan Anda di sini"></textarea>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>
    
</div> --}}