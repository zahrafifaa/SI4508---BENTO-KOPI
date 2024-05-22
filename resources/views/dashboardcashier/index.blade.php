@extends('dashboardcashier.layouts.main')

@section('container')
<div class="pt-3 pb-2 mb-3">
  <div class="row">
    <div class="col-8">
      <div class="container">
        <h1>Daftar Menu yang Dipesan</h1>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Dipesan oleh</th>nam
                <th scope="col">Pesan Khusus</th>
                {{-- <th scope="col">Waktu Pemesanan</th> --}}
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Status Pemesanan</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach($orderedMenus as $groupKey => $orders)
              @php
                list($userId, $time) = explode('_', $groupKey);
                $user = $orders->first()->cart->user;
                // Fetch the order table related to the current cart and time
                $specialMessage = $orders->first()->cart->orderTables
                    ->where('created_at', $orders->first()->created_at)
                    ->first()->special_message ?? 'Tidak ada pesan khusus';
              @endphp
              <tr>
                <td>{{ $no++ }}</td>
                <td>
                    @foreach($orders as $order)
                      {{ $order->menu->nama }} <br> <!-- Menambahkan tag <br> untuk membuat setiap item ditampilkan dalam baris terpisah -->
                    @endforeach
                  </td>
                  <td>
                    @foreach($orders as $order)
                      Rp {{ $order->menu->harga }} <br> <!-- Menambahkan tag <br> untuk membuat setiap item ditampilkan dalam baris terpisah -->
                    @endforeach
                  </td>
                  <td>
                    @foreach($orders as $order)
                      {{ $order->jumlah }} <br> <!-- Menambahkan tag <br> untuk membuat setiap item ditampilkan dalam baris terpisah -->
                    @endforeach
                  </td>
                <td>{{ $user->name }}</td>
                <td>{{ $specialMessage }}</td>
                {{-- <td>{{ $time }}</td> --}}
                <td>Status</td>
                <td>Status</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <div class="col-4">
        <div class="container">
            <h1>Gambar Acak</h1>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @php
                    // Mengumpulkan semua gambar menu
                    $allImages = [];
                    foreach($orderedMenus as $orders) {
                        foreach($orders as $order) {
                            $allImages[] = $order->menu->gambar;
                        }
                    }
                    // Memilih 3 gambar secara acak
                    $randomImages = array_rand(array_flip($allImages), 3);
                  @endphp
                  @foreach($randomImages as $key => $image)
                  <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                    <img src="{{ $image }}" class="d-block w-100" alt="Menu Image">
                  </div>
                  @endforeach
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
{{-- 
<h1>Pesanan Sedang Dipesan</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Pesan Khusus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderedMenus as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->cart->user->name }}</td>
                    <td>{{ $order->menu->nama }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>{{ $orderTable->special_message ?? 'Tidak ada pesan khusus' }}</td>
                </tr>
                
            @endforeach
        </div>
                        {{-- <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->orderTable->cart->user->name }}</td>
                            <td>{{ $itemOrder->menu->nama }}</td>
                            <td>{{ $itemOrder->jumlah }}</td>
                            <td>{{ $order->orderTable->special_message }}</td>
                        </tr> --}}
