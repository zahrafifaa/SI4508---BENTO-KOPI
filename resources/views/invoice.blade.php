@extends('layout/main')


@section('isiPage')
    <main>
        
        <table>
            <tr>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Jumlah</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->menu->nama }}</td>
                <td><img src="{{ $order->menu->gambar }}" alt="Product Image" style="max-width: 136px;"></td>
                <td>{{ $order->jumlah }}</td>
            </tr>
            @endforeach
        </table>

        
    </main>
@endsection
