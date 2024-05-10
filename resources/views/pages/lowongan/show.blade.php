@extends('layout/main')


@section('isiPage')
    <h1 class="mt-4">Detail {{ $item->judul }}</h1>
    <div class="row mb-3 text-center">
        <div class="col-md-8 themed-grid-col"></div>
        <div class="col-md-4 themed-grid-col">

        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="text-center mb-5">
                <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height:320px" alt="">
            </div>
<<<<<<< HEAD
            <p>Tanggal Dibuka : {{ $item->tanggal_buka->translatedFormat('d F Y') }}</p>
            <p>Tanggal Ditutup : {{ $item->tanggal_tutup->translatedFormat('d F Y') }}</p>
=======
            <p>Tanggal Dibuka : {{ $item->tanggal_buka }}</p>
            <p>Tanggal Ditutup : {{ $item->tanggal_tutup }}</p>
>>>>>>> 2fd7998b261c423801df0cf4ef1a18af34189db7

            <p>{!! $item->deskripsi !!}</p>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('lowongan.apply', $item->id) }}" class="btn btn-primary w-100">Apply Sekarang</a>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
@endsection
