@extends('dashboardcashier.layouts.main')

@section('container')
<div class="container">
    @if (empty($orders))
        <p>Belum ada pesanan</p>
    @else
        <h2>Detail Pesanan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Special Message</th>
                    <th>Status Pembayaran</th>
                    <th>Nama Pemesan</th>
                    <th>Ubah Status Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $iteration = 1;
                @endphp
                @foreach ($orders as $orderTableId => $order)
                    @foreach ($order['items'] as $index => $item)
                        <tr>
                            @if ($index === 0)
                                <td rowspan="{{ count($order['items']) }}">{{ $iteration }}</td>
                                @php
                                    $iteration++;
                                @endphp
                            @endif
                            <td>{{ $item->menu->nama }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp {{ number_format($item->menu->harga * $item->jumlah, 2) }}</td>
                            @if ($index === 0)
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->orderTable->special_message ?? 'Tidak ada pesan khusus' }}</td>
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->status }}</td>
                                <td rowspan="{{ count($order['items']) }}">{{ $order['dashboardCashier']->orderTable->user->name ?? 'Tidak ditemukan' }}</td>
                                <td rowspan="{{ count($order['items']) }}">
                                    <form method="POST" action="{{ route('dashboardcashier.updateStatus', $order['dashboardCashier']->id) }}">
                                        @csrf
                                        <select class="form-select @error('status_pemesanan') is-invalid @enderror" name="status_pemesanan">
                                            <option value="Belum ditinjau" {{ $order['dashboardCashier']->status_pemesanan == 'Belum ditinjau' ? 'selected' : '' }}>Belum Diproses</option>
                                            <option value="Diproses" {{ $order['dashboardCashier']->status_pemesanan == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Diterima" {{ $order['dashboardCashier']->status_pemesanan == 'Diterima' ? 'selected' : '' }}>Pesanan Selesai</option>
                                        </select>  
                                        <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                                    </form>
                                </td>
                                <td rowspan="{{ count($order['items']) }}">
                                    @if ($order['dashboardCashier']->status_pemesanan == 'Diterima')
                                        <form method="POST" action="{{ route('dashboardcashier.completeOrder', $order['dashboardCashier']->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-success mt-2" type="submit">Selesaikan Pesanan</button>
                                        </form>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<style>
  .carousel-image {
    height: 300px;
    object-fit: cover;
  }
</style>
@endsection
