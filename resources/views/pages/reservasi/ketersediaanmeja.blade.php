@extends('layout/main')


@section('isiPage')
<h1>Ketersediaan Meja</h1>
<p>Tanggal Reservasi: {{ $tgl_reservasi }}</p>
<p>Waktu Reservasi: {{ $wkt_reservasi }}</p>
<h1>Jumlah Meja Tersedia:</h1>
<ul>
@foreach($tables as $table)
     <li>Kapasitas: {{ $table->kapasitas }}, Area Meja: {{ $table->area_meja }}</li>
@endforeach
</ul>
@endsection