@extends('layout/main')


@section('isiPage')
    <div class="row mb-3 justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-4 text-center">{{ $item->judul }}</h1>
        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center mb-5">
                <img src="{{ $item->gambar() }}" class="img-fluid" alt="">
            </div>
            <p>
                <span class="badge text-bg-secondary">{{ $item->kategori_artikel->nama }}</span>
                <span class="badge text-bg-success">{{ $item->created_at->diffforhumans() }}</span>
            </p>
            <p>{!! $item->deskripsi !!}</p>
        </div>
    </div><!-- /.row -->
@endsection
