@extends('layout/main')

@section('isiPage')
<div class="row">
    <div class="col-md-9">
        @foreach ($carts as $cart)
        <section class="cart">
            <div class="container rounded-3 mt-5" style="background-color: #efefef">
                {{-- Baris Header Menu --}}
                <div class="d-flex justify-content-between pt-2">
                    <div class="namaMenu fs-5 fw-bold ">
                        {{ $cart->menu->nama }}
                    </div>
                    <div class="hapusMenu">
                        <!-- Form untuk menghapus item -->
                        <form action="{{ route('cart.destroy', $cart->menu_id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="trash-icon " style="border:none ; background-color: transparent;"><i data-feather='trash-2'></i></button>
                        </form>
                    </div>
                </div>
                <div class="line w-10"></div>
                {{-- Akhir Baris Header Menu --}}

                {{-- Gambar Menu --}}
                <div class="gambarMenu col-10 mt-4">
                    <img src="{{ $cart->menu->gambar }}" alt="Product Image" style="max-width: 136px;">
                </div>
                {{-- Akhir Gambar Menu --}}

                {{-- Tombol dan Harga Menu --}}
                <div class="row ms-0">
                    <span class="rounded-3 col-3 my-3"  style="border:1px solid #007200">
                        <div class="row d-flex">
                            <!-- Form untuk mengurangi jumlah -->
                            <div class="col-sm-4 d-flex justify-content-center">
                                <form action="{{ route('cart.reduceQuantity') }}" method="POST" class="">
                                     @csrf
                                    <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                                    <button class="minus-icon" style="border:none ; background-color: transparent;" >
                                        <i data-feather='minus'></i>
                                    </button>
                                </form>
                            </div>
                            <!-- Akhir Form untuk mengurangi jumlah -->

                             <!-- Jumlah item -->
                            <div class="jumlah col-sm-4 text-center " id="jumlahMenu">
                                {{ $cart->jumlah }}
                            </div>
                             <!-- Akhir Jumlah item -->

                            <!-- Form untuk menambah jumlah -->
                            <div class="col-sm-4 d-flex justify-content-center">
                                <form action="{{ route('cart.increaseQuantity') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $cart->menu_id }}" name="menu_id">
                                    <button class="plus-icon" style="border:none ; background-color: transparent;"><i data-feather='plus'></i></button>
                                </form>
                            </div>
                            <!-- Akhir Form untuk menambah jumlah -->
                        </div>
                    </span>
                    {{-- Harga --}}
                    <div class="hargaMenu col-9 text-end pt-3">
                        Rp {{ $cart->menu->harga }}
                    </div>
                    {{-- Akhir Harga --}}
                </div>
                {{-- Akhir Tombol dan Harga Menu --}}
            </div>
        </section>
        @endforeach
    </div>

    <!-- Kolom kanan untuk menampilkan total harga dan pesanan tambahan -->
    <div class="col-md-3">
        <div class="card mt-5">
            <div class="card-body pb-0">
                <h5 class="card-title">Rincian Harga</h5>
                <p>Total Harga: {{ $totalPrice }}</p>
                <p>Total Menu: {{ $totalItems }}</p>
            </div>
        </div>

        <!-- Text area untuk pesan khusus -->
        <div class="pesan tambahan mt-4">
            <form action="{{ route('cart.storeOrder') }}" method="POST">
                @csrf
                <textarea class="form-control" name="special_message" placeholder="Masukkan pesan khusus untuk pesanan Anda di sini"></textarea>
                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
        <!-- Akhir Text area untuk pesan khusus -->
    </div>
    <!-- Akhir Kolom kanan untuk menampilkan total harga dan pesanan tambahan -->
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