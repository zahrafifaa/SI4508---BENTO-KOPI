@extends('layout/main')


@section('isiPage')
    <h1 class="mt-4">{{ $item->nama }}</h1>
    <div class="row mb-3 text-center">
        <div class="col-md-8 themed-grid-col"></div>
        <div class="col-md-4 themed-grid-col">

        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="text-center mb-5"> 
                <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height:320px" alt="">
            </div>
            <p>Jam Buka : {{ $item->jam_buka }}</p>
            <p>Jam Tutup : {{ $item->jam_tutup }}</p>
            <p>Alamat : {{ $item->alamat }}</p>
            <p>Fasilitas : {{ $item->fasilitas }}</p>
        </div>
    </div><!-- /.row -->
@endsection