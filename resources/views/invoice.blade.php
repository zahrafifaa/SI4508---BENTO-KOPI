@extends('layout/main')


@section('isiPage')
    <main>
        @foreach($orders as $order)
        <table>
            <tr>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>{{ $order->menu->nama }}</td>
                <td><img src="{{ $order->menu->gambar }}" alt="Product Image" style="max-width: 136px;"></td>
                <td>{{ $order->jumlah }}</td>
            </tr>
        </table>

        @endforeach
    </main>
@endsection
