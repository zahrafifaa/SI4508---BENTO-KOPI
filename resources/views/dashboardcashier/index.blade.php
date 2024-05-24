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
                <th scope="col">Dipesan oleh</th>
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
                    {{ $order->menu->nama }} <br>
                  @endforeach
                </td>
                <td>
                  @foreach($orders as $order)
                    Rp {{ $order->menu->harga }} <br>
                  @endforeach
                </td>
                <td>
                  @foreach($orders as $order)
                    {{ $order->jumlah }} <br>
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
              // Memilih hingga 3 gambar secara acak
              $randomImages = count($allImages) >= 3 ? array_rand(array_flip($allImages), 3) : $allImages;
            @endphp
            @foreach($randomImages as $key => $image)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
              <img src="{{ $image }}" class="d-block w-100 carousel-image" alt="Menu Image">
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .carousel-image {
    height: 300px; /* Atur tinggi yang sama untuk semua gambar */
    object-fit: cover; /* Memastikan gambar sesuai dengan container tanpa mengubah rasio aspek */
  }
</style>
@endsection
